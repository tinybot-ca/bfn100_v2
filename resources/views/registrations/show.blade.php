@extends ('layouts.master')

@section ('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">

                <div class="card-header">
                    <h4 class>User Profile</h4>
                </div>
                
                @if (auth()->id() == $user->id)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item grid-bg">
                            <a class="btn btn-outline-primary btn-sm " href="/users/{{ $user->id }}/edit">Edit</a>
                        </li>
                    </ul>
                @endif

                <div class="card-body">

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

                </div><!-- card-body -->
            </div><!-- card -->

            <br />

            <div class="card">

                <div class="card-header">
                    <h4 class>Activity History</h4>
                </div>

                <div class="card-body">

                    <!-- Historical Push-up Activity -->
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

                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->
    
@endsection