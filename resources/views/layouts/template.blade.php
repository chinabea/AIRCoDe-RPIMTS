<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('../../plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('../plugins/fontawesome-free/css/all.min.css') }}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('../plugins/fullcalendar/main.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('../dist/css/adminlte.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </head>


</head>
<body>


    <!-- Authentication Links -->
    {{-- @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest --}}



    <!-- <main class="py-4"> -->
            @yield('contents')
    <!-- </main> -->



<!-- jQuery -->
<script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../../plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('../../plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('../../plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../../dist/js/demo.js') }}"></script>
<!-- Page specific script -->

<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>

<!-- Include JS file for DateRangePicker -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<!-- Include the required JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>
$(function () {
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
</script>

<script>

//Date range picker
$('#reservation').daterangepicker()
//Date range picker with time picker
$('#reservationtime').daterangepicker({
  timePicker: true,
  timePickerIncrement: 30,
  locale: {
    format: 'MM/DD/YYYY hh:mm A'
  }
})
//Date range as a button
$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Today'       : [moment(), moment()],
      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  },
  function (start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  }
)




</script>
</body>
</html>
