<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">

    <script defer src="{{ asset('lib/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script defer src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('partials.navbar')
    <div class="py-4 bg-light">
        <div class="container">
            
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>