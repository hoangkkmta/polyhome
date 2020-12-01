<!DOCTYPE html>
<html>

<head>
    @include('host::layouts.includes.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
            @include('host::layouts.includes.main_header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
            @include('host::layouts.includes.main_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- main footer -->
            @include('host::layouts.includes.main_footer')
        <!-- /.main footer -->
    </div>
    <!-- ./wrapper -->

        @include('host::layouts.includes.footer')
            @if(session('status'))
                <!-- Toastr -->
                <script>
                    $(document).ready(function () {
                        toastr.options.closeButton = true;
                        toastr.options.timeOut = 6000;
                        toastr.{{session('status')}}( '{{session('message')}}' )
                    });
                </script>
            @endif

        @stack('scripts')
</body>

</html>
