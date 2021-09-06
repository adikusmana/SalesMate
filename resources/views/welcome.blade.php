<!DOCTYPE html>
<html lang="en">

<head>
    <title>SalesMate | Welcome</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&amp;subset=latin-ext" rel="stylesheet">

    <!-- CSS -->
    <link href="splash/css/main.css" rel="stylesheet">

    <!-- JS -->
    <script src="splash/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="splash/js/vendor/jquery-1.12.0.min.js"></script>
</head>

<body>
    <div class="site" id="page">
        <a class="skip-link sr-only" href="#main">Skip to content</a>

        <!-- Options headline effects: .rotate | .slide | .zoom | .push | .clip -->
        <section class="hero-section hero-section--image clearfix clip">
            <div class="hero-section__wrap">
                <div class="hero-section__option">
                    <img src="splash/images/index.jpg" alt="Hero section image">
                </div>
                <!-- .hero-section__option -->

                <div class="container">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8">
                            <div class="title-01 title-01--11 text-center">
                                <h2>SalesMate</h2>
                                <h2 class="title__heading">
                                    <span>We are</span>
                                    <strong class="hero-section__words">
                                        <span class="title__effect is-visible">Productive</span>
                                        <span class="title__effect">Creative</span>
                                        <span class="title__effect">Discipline</span>
                                    </strong>
                                </h2>
                                <div class="title__description">Delivering extraordinary creations from the very
                                    beginning of the time!</div>

                                <!-- Options btn color: .btn-success | .btn-info | .btn-warning | .btn-danger | .btn-primary -->
                                <div class="title__action">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/home') }}" class="btn btn-success">Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                                        @endauth
                                    @endif
                                </div>
                            </div> <!-- .title-01 -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="splash/js/plugins/animate-headline.js"></script>
    <script src="splash/js/main.js"></script>
</body>

</html>