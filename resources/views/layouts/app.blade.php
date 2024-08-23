<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->site_name }}</title>

    <link rel="shortcut icon"
        href="{{ $settings->favicon ? $settings->faviconLink : asset('/assets/frontend/images/fav.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <x-navigation.header />

    @yield('content')
    <script src="{{ asset('/assets/backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
