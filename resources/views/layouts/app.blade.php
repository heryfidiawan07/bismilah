<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    
    <meta name="author" content="Kampus Mobil">
    <!-- to google -->
    <meta name="robots" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta content='Indonesia' name='geo.placename'/>
    <meta name="language"    content="id" />
    
    <meta name="url"           content="@yield('url')" />
    <meta name="title"         content="@yield('title')" />
    <meta name="description"   content="@yield('description')" />
    <meta name="image"         content="@yield('image')" />

    <meta property="fb:app_id"        content="283238748770550" />
    <meta property="og:url"           content="@yield('url')" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="@yield('title')" />
    <meta property="og:description"   content="@yield('description')" />
    <meta property="og:image"         content="@yield('image')" />
    <meta property="og:image:width"   content="600" />
    <meta property="og:image:height"  content="315" />
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    @yield('css')
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/modal.css" rel="stylesheet">
    <link href="/css/share.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rationale" rel="stylesheet">
    <link href='/partials/icon.png' rel='shortcut icon'>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1934841606759302'); // Insert your pixel ID here.
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1934841606759302&ev=PageView&noscript=1"
        />
    </noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
    @yield('event')
</head>
<body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-98383892-1', 'auto');
  ga('send', 'pageview');

</script>

    <div id="app">
        @include('layouts.nav')
        @include('layouts.brandmodal')
        @if(session('pesan'))
            <div class="alert alert-success animated bounceOutUp" style="position: absolute;">
                <small class="">{{session('pesan')}}</small>
            </div>
        @endif
        <div class="container" style="min-height: 495px;">
            @yield('content')
        </div>
        @include('users.pesan')
        <br>
        @include('layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/share.js"></script>
    @yield('js')
</body>
</html>
