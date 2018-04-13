@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">

                <div class="card-header">
                    <h4 class>Edit User Details</h4>
                </div>

                <div class="card-body">
                    @include ('layouts.errors')
            
                    <form method="POST" action="/users/{{ $user->id }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">
                                Username
                            </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" autocapitalize="off" required autofocus />
                        </div>

                        <div class="form-group">
                            <label for="email">
                                Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required />
                        </div>

                        <div class="form-group">
                            <label for="password">
                                Change Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">
                                Confirm Password
                            </label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                        </div>

                        <div class="form-group pt-3 mb-0 pb-0">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection