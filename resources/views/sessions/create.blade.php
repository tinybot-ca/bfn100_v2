@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Latest Activity -->
            <div class="card">

                <div class="card-header">
                    <h4 class>Login</h4>
                </div>

                <div class="card-body">
                    @include ('layouts.errors')

                    <form method="POST" action="/login">
                        {{ csrf_field() }}
        
                        <div class="form-group row">

                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                Email Address
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" required autofocus>

                                {{-- @if ($errors->has('email')) --}}
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                {{-- @endif --}}
                            </div>

                        </div><!-- form-group row -->
        
                        <div class="form-group">
                            <label for="password">
                                Password
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required>
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