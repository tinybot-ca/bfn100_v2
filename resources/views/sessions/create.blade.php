@extends ('layouts.master')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Login</h3>
            
            @include ('layouts.errors')
            
            <form method="POST" action="/login">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->
@endsection