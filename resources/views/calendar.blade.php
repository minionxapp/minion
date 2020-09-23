@extends('layout.master')

@section('head')
{{-- <link href='../plugins/fullcalendar/main.css' rel='stylesheet' />
<script src='../plugins/fullcalendar/main.js'></script> --}} --}}
<link href='../dist/calendar/lib/main.css' rel='stylesheet' />
<script src='../dist/calendar/lib/main.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
        });
        calendar.render();
      });
    </script>
    {{-- <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> --}}
  
@endsection

@section('content')
    <div id='calendar'></div>
@endsection


@section('js')
<script type="text/javascript">
var epent = [{title: 'Simple staticzzzzzzzzzzzzzzzzz event',start: '2020-09-24',end: '2020-09-28', description: 'Super cool event' },
{title: 'Simple wwwwwwwwwwwwwwwwwww event',start: '2020-09-24',end: '2020-09-28', description: 'Super cool event' }   ];
  $(document).ready(function() {
    var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: epent,
        });
        calendar.render();
      });

</script>
@endsection
{{-- calendar.addEvent( event [, source ] ) --}}