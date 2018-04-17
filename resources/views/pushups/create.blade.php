@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- New Submission Card -->
            <div class="card">

                <div class="card-header">
                    <h4>New Submission</h4>
                </div>
                
                <div class="card-body">
                    
                        @include ('layouts.errors')

                    <form method="POST" action="/pushups">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="date">
                                Date
                            </label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $date }}" />
                        </div>

                        <div class="form-group">
                            <label for="time">
                                Time
                            </label>
                            <input type="time" class="form-control" id="time" name="time" value="{{ $time }}" />
                        </div>

                        <div class="form-group">
                            <label for="username">
                                Username
                            </label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->name }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="amount">
                                # of push-ups
                            </label>
                            <input type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" name="amount" autofocus />

                            @if ($errors->has('amount'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="comment">
                                Comment
                            </label>
                            <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comment') }}" />
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