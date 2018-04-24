@extends ('layouts.master')

@section ('content')

<script src="https://vjs.zencdn.net/6.6.3/video.js"></script>
<link href="https://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

<!-- If you'd like to support IE8 -->
{{-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h4 class>Video Tutorial</h4>
                </div>
                
                <div class="card-body">

                    <!-- Video -->
                    <div id="video-container">
                    
                        <video id="my-video" class="video-js vjs-default-skin vjs-big-play-centered" preload="auto" width="688" poster="{{ asset('images/poster.png') }}" controls >
                            <source src="{{ asset('videos/The_Perfect_Push_Up.mp4') }}" type='video/mp4'>
                            <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                            </p>
                        </video>

                    </div>

                    <!-- Description -->
                    <li class="list-group-item grid-bg">
                        <h3>The Perfect Pushup</h3>
                        Proper form is key! This is a great video that provides information on form and technique. The main thing we want to avoid is injury!
                    </li>

                    <!-- Table of contents -->
                    <li class="list-group-item">
                        00:00 &nbsp;<a href="javascript:void(0)" onclick="seek(0)">Introduction</a>
                    </li>
                    <li class="list-group-item">
                        00:30 &nbsp;<a href="javascript:void(0)" onclick="seek(30)">Body Position</a>
                    </li>
                    <li class="list-group-item">
                        00:57 &nbsp;<a href="javascript:void(0)" onclick="seek(57)">Arm Position</a>
                    </li>
                    <li class="list-group-item">
                        02:02 &nbsp;<a href="javascript:void(0)" onclick="seek(122)">Range of Motion</a>
                    </li>
                    <li class="list-group-item">
                        02:20 &nbsp;<a href="javascript:void(0)" onclick="seek(140)">Shoulderblade Movement</a>
                    </li>
                    <li class="list-group-item">
                        03:03 &nbsp;<a href="javascript:void(0)" onclick="seek(183)">Summary</a>
                    </li>
                    
                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

<script>
    
    var myVideo = document.getElementById("my-video"); 

    function seek(seconds) {
        myVideo.currentTime = seconds;

        if (myVideo.paused) { 
            myVideo.play();
        }
    }

    document.documentElement.addEventListener('keydown', function (e) {
        if ( ( e.keycode || e.which ) == 32) {
            e.preventDefault();
            myVideo.paused ? myVideo.play() : myVideo.pause();
        }
    }, false);

    // Todo: Map arrow keys to rewind or forward +/- 10 secs
    // https://stackoverflow.com/questions/38604103/how-can-you-make-video-js-skip-forwards-and-backwards-15-seconds

    function resize() {
        let videoWidth = $( "#video-container" ).width();
        let videoRatio = 1.777777777777778;

        $( "#my-video" ).css('width', videoWidth);
        $( "#my-video" ).css('height', videoWidth / videoRatio);
    }

    $(function() {
        resize();
    });

    $( window ).resize(function() {
        resize();
    });

</script>

@endsection