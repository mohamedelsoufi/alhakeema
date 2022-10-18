<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Lte</title>
    <link rel="icon" href="{{ URL::asset('AdminLTELogo.png') }}" type="image/x-icon" sizes="32x32"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/daterangepicker/daterangepicker.css')}}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    {{--YearPicker--}}
    <link rel="stylesheet" href="{{asset('dashboard/custom/yearpicker.css')}}">

    @if(App::isLocale('ar'))
    <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/allAr.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlteAr.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('dashboard/custom/styleAr.css')}}">
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/ekko-lightbox/ekko-lightboxAr.css')}}">
        <!-- Select2 -->

    @else
    <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.css')}}">
        <!-- overlayScrollbars -->
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/custom/style.css')}}">
        <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins/ekko-lightbox/ekko-lightbox.css')}}">
    @endif

    @yield('styles')
    @yield('head')
</head>

<body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader Begin -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake scheme" src="{{asset('AdminLTELogo.png')}}" alt="AdminLTELogo">
    </div>
    <!-- Preloader End -->
{{--Navbar Begin--}}
@include('includes.navbar')
{{--Navbar End--}}

{{--Sidebar Begin--}}
@include('includes.sidebar')
{{--Sidebar End--}}

<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

{{--Footer Begin--}}
@include('includes.footer')
{{--Footer End--}}

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js"
        integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Ekko Lightbox -->
<script src="{{asset('dashboard//plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

{{-- custom Js --}}
<script src="{{asset('/dashboard/custom/image-preview.js')}}"></script>

<script src="{{asset('dashboard/plugins/ckeditor/ckeditor.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Select2 -->
<script src="{{asset('dashboard/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- InputMask -->
<script src="{{asset('dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

<!-- date-range-picker -->
<script src="{{asset('dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- YearPicker -->
<script src="{{asset('dashboard/custom/yearpicker.js')}}"></script>

<script>
    var year_num = Number($('.yearpicker').val());
    $('.yearpicker').yearpicker({
        year: year_num,
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        bsCustomFileInput.init();
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: { time: 'far fa-clock' },
            format: 'YYYY/MM/DD - hh:mm A'
        });
        $('#start_date').datetimepicker({
            icons: { time: 'far fa-clock' },
            format: 'YYYY/MM/DD  hh:mm A'
        });
        $('#end_date').datetimepicker({
            icons: { time: 'far fa-clock' },
            format: 'YYYY/MM/DD hh:mm A'
        });

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        });
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
        );

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
    });

</script>
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

        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@yield('scripts')


</body>

</html>
