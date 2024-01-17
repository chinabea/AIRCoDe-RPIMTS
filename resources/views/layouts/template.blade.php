<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RPIMTS</title>

<link rel="icon" type="image/png" href="{{ asset('dist/img/systemAIRCoDeLogo.png') }}">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<!-- newly added -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">



<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/simplemde/simplemde.min.css') }}">

<!-- DO NOT REMOVE THIS  -->
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('js/tinymce/skins/ui/oxide/skin.min.css') }}">

<!-- Bootstrap Select CSS https://cdn.jsdelivr.net/npm//dist/css/bootstrap-select.min.css -->
<link href="{{ asset('cdn/bootstrap-select@1.13.18.min.css') }}" rel="stylesheet">
<!-- jQuery https://code.jquery.com/jquery-3.5.1.min.js -->
<script src="{{ asset('cdn/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap JS https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js -->
<script src="{{ asset('cdn/bootstrap@4.5.2.min.js') }}"></script>
<!-- Bootstrap Select JS https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js -->
<script src="{{ asset('cdn/bootstrap-select@1.13.18-select.min.js') }}"></script>

<!-- Toastr -->
<!-- <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
<link rel="stylesheet" href="{{ asset('cdn/toastr.min.css') }}">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<script src="{{ asset('cdn/toastr.min.js') }}"></script>

</head>
@php
    $theme = false;
@endphp
{{-- <body class="hold-transition sidebar-mini dark-mode layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
{{-- <body class="hold-transition sidebar-mini {{ $theme ? 'dark-mode' : '' }} layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}


    <div class="wrapper">
        @include('layouts.topnav')

        @include('layouts.sidebar')

        @yield('content')

        @include('layouts.footer')


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('datatables.js') }}"></script>


<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
 <!-- CodeMirror -->
 <script src="{{ asset('plugins/codemirror/codemirror.js') }}"></script>
 <script src="{{ asset('plugins/codemirror/mode/css/css.js') }}"></script>
 <script src="{{ asset('plugins/codemirror/mode/xml/xml.js') }}"></script>
 <script src="{{ asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
 <!-- Custom Js -->
 <script src="{{ asset('js/custom.js') }}"></script>
 <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>


<script>
        // Function to toggle and persist the theme
        function toggleTheme() {
            const body = document.body;

            if (body.classList.contains('dark-mode')) {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                localStorage.setItem('theme', 'light');
            } else {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Add a click event listener to the theme toggle button
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', toggleTheme);
    </script>
    <script>
        // Retrieve the user's theme preference from local storage
        const savedTheme = localStorage.getItem('theme');

        // Set the theme based on the user's preference
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
        } else if (savedTheme === 'light') {
            document.body.classList.add('light-mode');
        }
    </script>
    <script>
        function confirmDelete(url) {
            if (confirm('Delete?')) {
                // Create a hidden form and submit it programmatically
                var form = document.createElement('form');
                form.action = url;
                form.method = 'POST';
                form.innerHTML = '@csrf @method("delete")';
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#generate_pdf").on("click", function() {
                // Submit the form directly when the "Generate PDF" button is clicked
                $("#exportForm").submit();
            });

            $("#btn_search").on("click", function() {
                // Get the values of start_date and end_date
                var startDate = $("#start_date").val();
                var endDate = $("#end_date").val();

                // Check if dates are empty
                if (startDate === "" || endDate === "") {
                    alert("Please enter Date 'From' and 'To' before submit");
                } else {
                    // Clear existing data
                    $('#load_data').empty();

                    // Display loading message
                    let loader = $('<tr><td colspan="6"><center>Searching....</center></td></tr>');
                    loader.appendTo('#load_data');

                    // Make AJAX request to Laravel controller
                    $.ajax({
                        url: "{{ route('search.projects') }}",
                        type: "GET",
                        data: {
                            _token: "{{ csrf_token() }}",
                            start_date: startDate,
                            end_date: endDate
                        },
                        success: function(data) {
                            // Handle the success response
                            console.log("Search success:", data);

                            // Update the search results section with the received data
                            $("#load_data").html(data.html);
                        },
                        error: function(error) {
                            // Handle errors if any
                            console.error("Search error:", error);
                        }
                    });
                }
            });
            

            $('#reset').on('click', function(){
                // Reload the page on reset button click
                location.reload();
            });
        });
    </script>




</body>
</html>
