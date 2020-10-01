@extends('layout.master')

@section('content')
    @include('layout.dashboard_content')
@endsection

@section('js')
<script type="text/javascript">

    $(document).ready(function() { 
        kalendar2();
      }
    );

    function kalendar() {
      $.ajax({
                url: '/getalleventapi',
                type: "GET",
                async: false,
                dataType: "json",
                success:function(data) {
                  alert(JSON.stringify(data));
                    // $('select[name="departement_kode"]').empty();
                    $.each(data, function(key, value) {
                      alert(JSON.stringify(value));
                    //     // if(divisi_kode== value.kode ){
                    //     //     // $('select[name="departement_kode"]').append('<option value="'+ value.kode +'" selected="true">'+ value.nama +'</option>');
                    //     // }else{
                    //     //     // $('select[name="departement_kode"]').append('<option value="'+ value.kode +'">'+ value.nama +'</option>');
                        // }
                    });
                }
            });
    }


function kalendar2() {
    var epent=[];
    var warna =['purple','green','blue','orange','brown']
    var events = {!! $epentlist !!};
    // alert(JSON.stringify(events));
    // =======================================
    var i = 0;
            @foreach ($epentlist as $item)
                i = i + 1;
                c = i % warna.length;
                {
                  epent.push({title: "{{$item->judul}} - {{$item->departement->nama}}",
                  start: "{{$item->mulai}}", end:"{{$item->selesai}}T23:59:00", 
                  description:"{{$item->deskripsi}}",color:warna[c],allDay:true});
                }
            @endforeach  
    // ======================================
      // for(var i =0; i < events.length; i++)
      // {
      //   c = i % warna.length;
      //   //alert(events[i].departement);
      //   // JSON.stringify(events[i].departement)
      //   {
      //     epent.push({title: events[i].judul+" - "+JSON.stringify(events[i].departement.nama), 
      //      start: events[i].mulai, end:events[i].selesai, description:events[i].deskripsi,color:warna[c]});
      //   }
      // }
  
      var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: epent,
            timeFormat:'H(:mm)',
            displayEventTime:false,
            // allDay:true,
          });
          calendar.render();
  }

</script>
@endsection