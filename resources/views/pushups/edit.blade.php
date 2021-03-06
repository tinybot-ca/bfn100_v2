@extends ('layouts.master')

@section ('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Edit Pushup Card -->
            <div class="card">

                <div class="card-header">
                    <h4>Edit Record</h4>
                </div>
                
                <!-- Action Buttons -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item grid-bg">
                    <a class="btn btn-outline-primary btn-sm " href="{{ url()->previous() }}">Cancel</a>
                    </li>
                </ul>

                <div class="card-body">
                    
                    {{-- @include ('layouts.errors') --}}
                    
                    <form method="POST" action="/pushups/{{ $pushup->id }}" novalidate>
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label text-md-right">
                                Date
                            </label>

                            <div class="col-md-6">
                                <input type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" name="date" value="{{ old('date', $pushup->date) }}" />

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label text-md-right">
                                Time
                            </label>

                            <div class="col-md-6">
                                <input type="time" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" id="time" name="time" value="{{ old('time', $pushup->time) }}" />

                                @if ($errors->has('time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
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
                                <input type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" name="amount" value="{{ old('amount', $pushup->amount) }}" autofocus />

                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-sm-4 col-form-label text-md-right">
                                Comment
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" id="comment" name="comment" value="{{ old('comment', $pushup->comment) }}" />

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
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