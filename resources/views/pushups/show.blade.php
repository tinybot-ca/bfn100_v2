@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h4 class>Record Detail</h4>
                </div>
                
                <!-- Action Buttons -->
                @if (auth()->id() == $pushup->user->id)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item grid-bg">
                            <a class="btn btn-outline-primary btn-sm " href="/pushups/{{ $pushup->id }}/edit">Edit</a>
                            <a class="btn btn-outline-primary btn-sm " href="/pushups/{{ $pushup->id }}/delete">Delete</a>
                        </li>
                    </ul>
                @endif

                <div class="card-body">

                    <!-- Push-Up Detail -->
                    <div class="attributes">
                        <dl>
                            <dt>Record ID</dt>
                            <dd>{{ $pushup->id }}</dd>
                        </dl>
                        <dl>
                            <dt>Date</dt>
                            <dd>{{ $pushup->datetime->toDayDateTimeString() }}</dd>
                        </dl>
                        <dl>
                            <dt>Username</dt>
                                <dd><a href="/users/{{ $pushup->user->id }}">{{ $pushup->user->name }}</a></dd>
                        </dl>
                        <dl>
                            <dt># of push-ups</dt>
                            <dd>{{ $pushup->amount }}</dd>
                        </dl>
                        <dl>
                            <dt>Comment</dt>
                            <dd>{{ $pushup->comment }}</dd>
                        </dl>
                    </div>
                    
                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection