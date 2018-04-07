@extends ('layouts.master')

@section ('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>New Submission</h3>
                <div class="actions mb-3">
                    <a class="btn btn-outline-primary btn-sm" href="{{ url()->previous() }}">Cancel</a>
                </div>
                
                @include ('layouts.errors')
                
                <form method="post" action="/pushups">
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
                        <input type="text" class="form-control" id="username" name="username" disabled/>
                    </div>

                    <div class="form-group">
                        <label for="amount">
                            # of push-ups
                        </label>
                        <input type="text" class="form-control" id="amount" name="amount" />
                    </div>

                    <div class="form-group">
                        <label for="comment">
                            Comment
                        </label>
                        <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comment') }}" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
@endsection