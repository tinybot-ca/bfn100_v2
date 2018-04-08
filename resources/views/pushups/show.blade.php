@extends ('layouts.master')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <h3>
                Record Detail
            </h3>

            <div class="actions mb-3">
                <a class="btn btn-primary btn-sm" href="/users/show.php?id=1">Back to User</a>
                <a class="btn btn-primary btn-sm " href="/pushups/edit.php?id=221">Edit</a>
                <a class="btn btn-primary btn-sm " href="/pushups/delete.php?id=221">Delete</a>
            </div>

            <!-- Push-Up Detail -->
            <div class="attributes">
                <dl>
                    <dt>Record ID</dt>
                    <dd>{{ $pushup-> id }}</dd>
                </dl>
                <dl>
                    <dt>Date</dt>
                    <dd>{{ $pushup->datetime->toDayDateTimeString() }}</dd>
                </dl>
                <dl>
                    <dt>Username</dt>
                    <dd>{{ $pushup->user->name }}</dd>
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