@extends('layout.master')

{{-- @section('head')
@endsection --}}

@section('content')
    <div id='calendar'></div>
    
@endsection


@section('js')
<script type="text/javascript">

  $(document).ready(function() { 
      kalendar();
    }
  );

function kalendar() {
  var epent=[];
    var sites = {!! $epentlist !!};
    for(var i =0; i < sites.length; i++)
    {
      {
        epent.push({title: sites[i].judul+" - "+sites[i].departement, 
         start: sites[i].mulai, end:sites[i].selesai, description:sites[i].deskripsi});
      }
    }

    var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: epent,
        });
        calendar.render();
}
</script>
@endsection
{{-- calendar.addEvent( event [, source ] ) --}}