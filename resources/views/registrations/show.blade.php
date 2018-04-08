@extends ('layouts.master')

@section ('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <h3>User Profile</h3>
            
            <div class="actions mb-3">
                <a class="btn btn-outline-primary btn-sm " href="/users/edit">Edit</a>
            </div>

            <!-- User Profile -->
            <div class="attributes">
                <dl>
                    <dt>Username</dt>
                    <dd>{{ $user->name }}</dd>
                </dl>
                <dl>
                    <dt>Email</dt>
                    <dd>{{ $user->email }}</dd>
                </dl>
            </div>

            <!-- Historical Push-up Activity -->
            <h3>Activity History</h3>
            <table class="table table-hover table-sm table-responsive-sm">
                
                <thead class="thead-light">
                    <tr>
                        <th>Date</th>
                        <th>#</th>
                        <th>Comment</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pushups as $pushup)
                    <tr>
                        <td nowrap><a href="/pushups/{{ $pushup->id }}">{{ $pushup->datetime->toDayDateTimeString() }}</a></td>
                        <td>{{ $pushup->amount }}</td>
                        <td>{{ $pushup->comment }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->
    
@endsection