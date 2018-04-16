@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">

                <div class="card-header">
                    <h4 class>Edit User Details</h4>
                </div>

                <!-- Action Buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item grid-bg">
                    <a class="btn btn-outline-primary btn-sm " href="{{ url()->previous() }}">Cancel</a>
                    </li>
                </ul>

                <div class="card-body">
            
                    <form method="POST" action="/users/{{ $user->id }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">
                                Username
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name', $user->name) }}" autocapitalize="off" required autofocus />

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                Email
                            </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email', $user->email) }}" required />

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">
                                Change Password
                            </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" />

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label text-md-right">
                                Confirm Password
                            </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" />

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>

                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection