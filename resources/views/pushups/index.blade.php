@extends ('layouts.master')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Latest Activity -->
                <div class="card">

                    <div class="card-header">
                        <h4 class="mt-0 mb-0 pt-0 pb-0">Recent Activity</h4>
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

                    <div class="card-body">
                            <a class="card-link btn btn-primary" href="/pushups/create">Submit</a>
                    </div>

                </div><!-- card -->
            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->

    @include ('layouts.highcharts')
@endsection