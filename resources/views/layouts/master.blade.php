<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="/css/public.css" />
    <!-- Bookmark Icons -->
    <link href="{{ asset('images/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <link href="{{ asset('images/apple-touch-icon-152x152.png') }}" rel="apple-touch-icon" sizes="152x152" />
    <link href="{{ asset('images/apple-touch-icon-167x167.png') }}" rel="apple-touch-icon" sizes="167x167" />
    <link href="{{ asset('images/apple-touch-icon-180x180.png') }}" rel="apple-touch-icon" sizes="180x180" />
    <link href="{{ asset('images/icon-hires.png') }}" rel="icon" sizes="256x256" />
    <link href="{{ asset('images/icon-normal.png') }}" rel="icon" sizes="128x128" />
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- Page Title -->
    <title>BFN100</title>
</head>

<body>

@include ('layouts.nav')

<div class="mt-4 mb-4"></div>

@if ($flash = session('message'))
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
                <div id="flash-message" class="alert alert-success" role="alert">
                    {{ $flash }}
                </div>
            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
@endif

@yield ('content')
@include ('layouts.footer')
</body>

</html>

