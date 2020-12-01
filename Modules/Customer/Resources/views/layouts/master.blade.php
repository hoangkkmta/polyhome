<!DOCTYPE html>
<html>

<head>
    @include('customer::layouts.includes.head')
    @stack('css')
</head>

<body class="header-sticky">
    <div class="boxed">

        <!-- Navbar -->
            @include('customer::layouts.includes.main_header')
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
            @yield('content')
        <!-- /.content-wrapper -->

        <!-- main footer -->
            @include('customer::layouts.includes.main_footer')
        <!-- /.main footer -->
    </div>
    <!-- ./wrapper -->

        @include('customer::layouts.includes.footer')

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
