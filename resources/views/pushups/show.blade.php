@extends ('layouts.master')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <h3>
                Record Detail
            </h3>

            <div class="actions mb-3">
                <a class="btn btn-outline-primary btn-sm " href="/pushups/edit">Edit</a>
                <a class="btn btn-outline-primary btn-sm " href="/pushups/delete">Delete</a>
            </div>

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

            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
@endsection