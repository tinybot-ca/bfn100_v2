@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">

                <div class="card-header">
                    <h4 class>Users</h4>
                </div>

                <!-- For admins only -->
                @if (false)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item grid-bg">
                            <a class="btn btn-outline-primary btn-sm" href="/">Create New User</a>
                        </li>
                    </ul>
                @endif

                <div class="card-body">
                    @include ('layouts.errors')

                    <table class="table table-hover table-sm table-responsive-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a class="action" href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div><!--card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection