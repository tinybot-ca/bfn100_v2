@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- Latest Activity -->
            <div class="card">

                <div class="card-header">
                    <h4 class>Login</h4>
                </div>

                <div class="card-body mb-0 pb-0">
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
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
        
                    </form>

                </div><!-- card-body -->
            </div><!-- card -->

        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection