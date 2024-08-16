<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>larafiles</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('select2.min.css') }}">
</head>

<body dir="rtl">
@include('frontend.partials.nav')
    <div class="container">
        <div class="card mt-5">
            <div class="row">
                <h5>
                    @yield('content')
                </h5>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jQuery.js') }}"></script>
    <script src="{{ asset('select2.min.js') }}"></script>
    @yield('script')
</body>

</html>
