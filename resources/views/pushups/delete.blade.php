@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- Edit Pushup Card -->
            <div class="card">

                <div class="card-header">
                    <h4>Delete Record</h4>
                </div>
                
                <div class="card-body">
                    
                    <div class="alert alert-danger">Press Confirm Delete to permanently erase this record.</div>
                    
                    <form method="POST" action="/pushups/{{ $pushup->id }}/delete">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="date">
                                Date
                            </label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('$pushup->date', $pushup->date) }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="time">
                                Time
                            </label>
                            <input type="time" class="form-control" id="time" name="time" value="{{ old('$pushup->time', $pushup->time) }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="username">
                                Username
                            </label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $pushup->user->name }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="amount">
                                # of push-ups
                            </label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{ old('$pushup->amount', $pushup->amount) }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="comment">
                                Comment
                            </label>
                            <input type="text" class="form-control" id="comment" name="comment" value="{{ old('$pushup->comment', $pushup->comment) }}" disabled />
                        </div>

                        <div class="form-group pt-3 mb-0 pb-0">
                            <button type="submit" class="btn btn-primary">Confirm Delete</button>
                        </div>

                    </form>
            
                </div><!-- card-body -->
            </div><!-- card -->
            
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

@endsection