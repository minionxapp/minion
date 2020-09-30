@extends('layout.master')

@section('content')
    @include('layout.dashboard_content')
@endsection

@section('js')
<script type="text/javascript">

    $(document).ready(function() { 
        kalendar();
      }
    );
function kalendar() {
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
                  start: "{{$item->mulai}}", end:"{{$item->selesai}} 23:01:01", 
                  description:"{{$item->deskripsi}}",color:warna[c]});
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
            events: epent
          });
          calendar.render();
  }

</script>
@endsection