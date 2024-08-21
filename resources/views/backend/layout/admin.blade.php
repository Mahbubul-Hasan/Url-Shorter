<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/frontend/images/fav.png') }}" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('/assets/backend/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('/assets/backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('/assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />


    @stack('style')

    <!-- App Css-->
    <link href="{{ asset('/assets/backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/backend/css/custom.css') }}" rel="stylesheet" />

</head>

<body>
    <div id="layout-wrapper">


        <x-backend.navigation.header />
        <x-backend.navigation.sidebar />

        <div class="main-content">

            <div class="page-content">
                @yield('main')
            </div>

            <x-backend.navigation.footer />

        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('/assets/backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('/assets/backend/libs/pace-js/pace.min.js') }}"></script>
    <!-- toastr js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('scripts')
    <script src="{{ asset('/assets/backend/js/app.js') }}"></script>
    <script src="{{ asset('/assets/backend/js/custom.js') }}"></script>

    @stack('extra-scripts')
    @if (session()->has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.{{ session('type') }}('{{ session('message') }}', '{{ strtoupper(session('type')) }}');
        </script>
    @endif

</body>

</html>
