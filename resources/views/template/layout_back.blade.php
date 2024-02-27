<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title>@yield('title', 'Index')</title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('') }}assets/img/brand/favicon.png" type="image/x-icon" />

    <!-- Bootstrap css -->
    <link href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" id="style" />

    <!--- Style css --->
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/plugins.css" rel="stylesheet">

    <!--- Icons css --->
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('') }}assets/css/animate.css" rel="stylesheet">

    @stack('costum-css')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}plugin/datatables/css.css" />
    <!---datepicker-->
    <link href="{{ asset('') }}plugin/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link href="{{ asset('') }}plugin/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />

    <!--- JQuery min js --->
    <script src="{{ asset('') }}plugin/jquery-3.6.0.js"></script>
    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
    <!-- DataTables  -->
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/pdf.js"></script>
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/font.js"></script>
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/datatables.js"></script>
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/js/dataTables.checkboxes.min.js"></script>
    <!---select2-->
    <script src="{{ asset('') }}plugin/select2/select2.full.min.js"></script>
    <!---datepicker-->
    <script src="{{ asset('') }}plugin/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('') }}plugin/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!---Highchart-->
    <script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/highcharts.js"></script>
    <script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/series-label.js"></script>
    <script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/exporting.js"></script>
    <script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/offline-exporting.js"></script>
    <script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/export-data.js"></script>

</head>

<body class="main-body app sidebar-mini ltr">

    <!-- LOADING -->
    <div id="global-loader">
        <img src="{{ asset('assets') }}/img/loaders/loader-3.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /LOADING -->

    <!-- page -->
    <div class="page custom-index">

        <!-- MEMANGGIL FILE NAVHEADER -->
        @include('template.navheader')
        <!-- /END MEMANGGIL FILE NAVHEADER -->

        <!-- MEMANGGIL FILE SIDEBAR -->
        @include('template.sidebar')
        <!-- /END MEMANGGIL FILE SIDEBAR  -->

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- CONTENT DARI HALAMAN -->
            @yield('content')
            <!-- /END CONTENT DARI HALAMAN -->
        </div>
        <!-- /main-content -->

        <!-- MEMANGGIL FILE FOOTER -->
        @include('template.footer')
        <!--END MEMANGGIL FILE FOOTER -->
    </div>
    <!-- page closed -->

    <!--- Back-to-top --->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    <!--- MEMANGGIL FILE SCRIPT --->
    <script src="{{ asset('assets/js/rangeslider.js') }}"></script>

    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('') }}assets/plugins/bootstrap/popper.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('') }}assets/plugins/ionicons/ionicons.js"></script>

    <!--- Chart bundle min js --->
    <script src="{{ asset('') }}assets/plugins/chart.js/Chart.bundle.min.js"></script>

    <!--- JQuery sparkline js --->
    <script src="{{ asset('') }}assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!--- Eva-icons js --->
    <script src="{{ asset('') }}assets/js/eva-icons.min.js"></script>

    <!--- Moment js --->
    <script src="{{ asset('') }}assets/plugins/moment/moment.js"></script>

    <!--- Perfect-scrollbar js --->
    <script src="{{ asset('') }}assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/perfect-scrollbar/p-scroll.js"></script>

    <!--- Sidebar js --->
    <script src="{{ asset('') }}assets/plugins/side-menu/sidemenu.js"></script>

    <!--- sticky js --->
    <script src="{{ asset('') }}assets/js/sticky.js"></script>

    <!--- Select2.min js --->
    {{-- <script src="{{ asset('') }}assets/plugins/select2/js/select2.min.js"></script> --}}

    <!-- right-sidebar js -->
    <script src="{{ asset('') }}assets/plugins/sidebar/sidebar.js"></script>
    <script src="{{ asset('') }}assets/plugins/sidebar/sidebar-custom.js"></script>

    <!-- Morris js -->
    <script src="{{ asset('') }}assets/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/morris.js/morris.min.js"></script>

    <!--- Internal Modal js --->
    <script src="{{ asset('') }}assets/js/modal.js"></script>

    <!--- Internal Sweet-Alert js --->
    <script src="{{ asset('') }}assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>

    <!--- Scripts js --->
    <script src="{{ asset('') }}assets/js/script.js"></script>

    <!--- Index js --->
    <script src="{{ asset('') }}assets/js/index.js"></script>

    <!--themecolor js-->
    <script src="{{ asset('') }}assets/js/themecolor.js"></script>

    <!--swither-styles js-->
    <script src="{{ asset('') }}assets/js/swither-styles.js"></script>

    <!--- Custom js --->
    <script src="{{ asset('') }}assets/js/custom.js"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('') }}assets/plugins/rating/jquery-rate-picker.js"></script>
    <script src="{{ asset('') }}assets/plugins/rating/rating-picker.js"></script>

    <!-- Star Rating-1 Js-->
    <script src="{{ asset('') }}assets/plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="{{ asset('') }}assets/plugins/ratings-2/star-rating.js"></script>

    {{-- <!-- DATA TABLE JS-->
    <script src="{{ asset('') }}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/buttons.print.min.qjs"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}assets/js/table-data.js"></script> --}}
    @stack('costum-script')
    <script>
        $(function() {
            // formelement
            $('.select2').select2({
                width: 'resolve'
            });

            // init datatable.
            $('#basic-datatable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        });
    </script>
</body>

</html>
