<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="{{ asset('assets/auth/images/icons/favicon.ico') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/animate/animate.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/css-hamburgers/hamburgers.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/vendor/select2/select2.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/util.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/auth/css/main.css') }}" />
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('assets/auth/images/img-01.png') }}" alt="IMG" />
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
