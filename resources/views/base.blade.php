<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="apple-mobile-web-app-capable" content="yes">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://use.typekit.net/zku1gzu.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js"></script>

	<title>Tara</title>
</head>
<body class="@yield('body-class')">
    @yield('content')

    @include('symbols')

    <div class="transition">
        <svg height="200" width="200">
          <circle cx="100" cy="100" r="100" fill="red" />
        </svg>
    </div>
    <div class="dimmer"></div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>