@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Latest Activity -->
            <div class="card">

                <div class="card-header">
                    <h4 class>Recent Activity</h4>
                </div>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item grid-bg">
                        <a class="card-link btn btn-outline-primary btn-sm" href="/pushups/create">Submit</a>
                    </li>

                    @foreach ($pushups as $pushup)
                    <li class="list-group-item">
                        <strong>{{ $pushup->datetime->diffForHumans() }}</strong> <a href="/users/{{ $pushup->user->id }}"><u>{{ $pushup->user->name }}</u></a> completed {{ $pushup->amount }} push-ups. 
                            @if ( $pushup->comment )
                                <i>"<a href="/pushups/{{ $pushup->id }}">{{ $pushup->comment }}</a>"</i>
                            @endif
                    </li>
                    @endforeach
                    
                </ul>

            </div><!-- card -->

        </div><!-- col-md-8 -->
    </div><!-- row -->
</div><!-- container -->

<br />

@include ('layouts.highcharts')

@endsection