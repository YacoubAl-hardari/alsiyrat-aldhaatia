<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="{{ asset('front/plugins/filter/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/plugins/animated/headline.css') }}" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/icons.css') }}" rel="stylesheet" type="text/css">
    <style>
        :root{
            --primary_color:#607d8b;
        }
    </style>
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
        <div class="container"><a class="navbar-brand" href="#">يعقوب الحيدري</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav"
                aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
                    <!--end navbar-toggler-->
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="btn btn-blue btn-sm px-4" href="#" id="lnkPrint"><i
                                class="'uil uil-print mr-1 font-16"></i>طباعة</a></li>
                </ul>
            </div><!--end collapse-->
        </div><!--end container-->
    </nav>
    <!--end nav-->
    

        {{ $slot }}

            <!--end main-wraper--><!-- jQuery  -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/plugins/ripple/jquery.ripples.js') }}"></script>
    <script src="{{ asset('front/plugins/animated/headline.js') }}"></script>
    <script src="{{ asset('front/plugins/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front/plugins/counter/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/plugins/filter/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/plugins/filter/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/plugins/filter/jquery.magnific-popup.min.js') }}"></script><!-- App js -->
    <script src="{{ asset('front/js/app.js') }}"></script>
</body>

</html>
    </body>
</html>
