<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    
    <meta property="og:url"           content="@yield('url')" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="@yield('title')" />
    <meta property="og:description"   content="@yield('description')" />
    <meta property="og:image"         content="@yield('image')" />
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/modal.css" rel="stylesheet">
    <link href="/css/share.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='/icon.png' rel='shortcut icon'>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        @include('layouts.brandmodal')
        <div class="container" style="min-height: 458px;">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/share.js"></script>
    @yield('js')
</body>
</html>
