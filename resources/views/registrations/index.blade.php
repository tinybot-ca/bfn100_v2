@extends ('layouts.master')

@section ('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Users</h3>
                
                <div class="actions mb-3">
                    <a class="btn btn-outline-primary btn-sm" href="/">Create New User</a>
                </div>

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

            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->

@endsection