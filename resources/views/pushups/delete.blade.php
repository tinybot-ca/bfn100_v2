@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Edit Pushup Card -->
            <div class="card">

                <div class="card-header">
                    <h4>Delete Record</h4>
                </div>

                <!-- Action Buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item grid-bg">
                    <a class="btn btn-outline-primary btn-sm " href="{{ url()->previous() }}">Cancel</a>
                    </li>
                </ul>
                
                <div class="card-body">
                    
                    <div class="alert alert-danger"><strong>Warning!</strong> Are you sure you want to delete this?</div>
                    
                    <form method="POST" action="/pushups/{{ $pushup->id }}/delete">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label text-md-right">
                                Date
                            </label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $pushup->date) }}" disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label text-md-right">
                                Time
                            </label>

                            <div class="col-md-6">
                                <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $pushup->time) }}" disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label text-md-right">
                                Username
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="username" name="username" value="{{ $pushup->user->name }}" disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-sm-4 col-form-label text-md-right">
                                # of push-ups
                            </label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $pushup->amount) }}" disabled />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-sm-4 col-form-label text-md-right">
                                Comment
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comment', $pushup->comment) }}" disabled />
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Confirm Delete</button>
                            </div>
                        </div>

                    </form>
            
                </div><!-- card-body -->
            </div><!-- card -->
            
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection