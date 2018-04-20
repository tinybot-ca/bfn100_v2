@extends ('layouts.master')

@section ('content')

<link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

<!-- If you'd like to support IE8 -->
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h4 class>Video Tutorial</h4>
                </div>
                
                <div class="card-body">

                    <!-- Video -->
                    <div class="video-container">
                    
                    <video id="my-video" class="video-js" controls preload="auto" width="688" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                        <source src="{{ asset('videos/The_Perfect_Push_Up.mp4') }}" type='video/mp4'>
                        <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>

                    </div>

                    <!-- Table of contents -->
                    <li class="list-group-item">
                        00:00 <a onclick=""> Introduction </a>
                    </li>
                    <li class="list-group-item">
                        00:00 <a onclick=""> Next Section </a>
                    </li>
                    
                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

<script src="http://vjs.zencdn.net/6.6.3/video.js"></script>

@endsection