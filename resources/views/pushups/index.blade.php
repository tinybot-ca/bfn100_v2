@extends ('layouts.master')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Latest Activity -->
                <div class="card">
                    <div class="card-header">
                        <h3>Recent Activity</h3>
                        <a class="card-link btn btn-outline-primary btn-sm ml-auto" href="/pushups/create">Submit</a>
                    </div>

                    <ul class="list-group list-group-flush">
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
            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->

    @include ('layouts.highcharts')
@endsection