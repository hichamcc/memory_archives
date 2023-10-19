<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('../icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('../icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('../icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('../icons//site.webmanifest') }}">
    <meta property="og:image" content="{{ asset('icons/android-chrome-192x192.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('icons/android-chrome-192x192.png')}}">
    @yield('head')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MemoryMemo') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('../css/custom.css?v16') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="container" >
                <a class="navbar-brand navbar-logo font-BP" href="{{ url('/') }}">
                  <b>MEMORY</b>ARCHIVES
                </a>

                <div>
                @if(request()->is('/'))
                    <!-- This is the home page, do not display the link -->
                        <a class="navbar-brand navbar-item font-BP invisible" href="{{ url('/') }}">
                            <img src="{{ asset('../icons/noun-back.svg') }}" style="max-height: 50px" alt="Back">
                        </a>
                    @else
                        <a class="navbar-brand navbar-item font-BP " href="{{ url('/') }}">
                            <img src="{{ asset('../icons/noun-back.svg') }}" style="max-height: 50px" alt="Back">
                        </a>
                    @endif
                    <a class="navbar-brand navbar-item font-BP" href="{{ url('/info') }}">
                       <u>INFO</u>
                    </a>
                </div>

            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    <button id="backToTopBtn" title="Back to Top">
        <img src="{{ asset('../icons/up-arrow.svg') }}" style="max-height: 20px" alt="Back">
    </button>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        // Show/hide the button based on scroll position
        $(window).scroll(function() {
            if ($(this).scrollTop() > 20) {
                $('#backToTopBtn').fadeIn();
            } else {
                $('#backToTopBtn').fadeOut();
            }
        });

        // Scroll to the top when the button is clicked
        $('#backToTopBtn').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 500); // 500 milliseconds for the animation
        });
    });
</script>

@yield('script')

</html>
