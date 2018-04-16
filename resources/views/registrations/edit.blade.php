@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">

                <div class="card-header">
                    <h4 class>Edit User Details</h4>
                </div>

                <div class="card-body">
                    @include ('layouts.errors')
            
                    <form method="POST" action="/users/{{ $user->id }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">
                                Username
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" autocapitalize="off" required autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                Email
                            </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">
                                Change Password
                            </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label text-md-right">
                                Confirm Password
                            </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                                <a class="btn btn-link" href="{{ url()->previous() }}">
                                        Cancel
                                </a>
                            </div>
                        </div>

                    </form>

                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection