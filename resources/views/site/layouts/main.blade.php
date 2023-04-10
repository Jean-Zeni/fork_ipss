<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>@yield('titulo')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{url('/')}}/favicon.ico">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-KXY74ZQNPT"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-KXY74ZQNPT');
        </script>
          @stack('styles') 
        <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsivo.css') }}">
    </head>

    <body class="d-flex flex-column h-100">
        @include('site.layouts._partials.header')

        <main role="main" class="flex-shrink-0">
            @yield('conteudo')
        </main>
    
        @include('site.layouts._partials.footer')

        <a href="https://web.whatsapp.com/send?phone=555182153223&text=Olá" id="whatsapp" target="_blank">
            <img src="{{url('/')}}/images/whatsapp-flutuante.png" alt="Whatsapp" width="100%">
        </a>
        @stack('scripts')
    </body>
</html>
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>