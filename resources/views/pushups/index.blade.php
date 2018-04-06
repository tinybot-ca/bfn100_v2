@extends ('layouts.master')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
            <!-- Latest Activity -->
            <h3>Recent Activity</h3>
            <a class="btn btn-outline-primary btn-sm mb-3" href="/pushups/create">Submit</a>
            <table class="table table-hover table-responsive-sm">
                <tbody>
                    @foreach ($pushups as $pushup)
                        <tr class="">
                            <td class="pl-0 pr-0">
                                <strong>{{ $pushup->datetime->diffForHumans() }}</strong> <a href="/"><u>{{ $pushup->user->name }}</u></a> completed {{ $pushup->amount }} push-ups. 
                                @if ( $pushup->comment )
                                    <i>"<a href="/pushups/{{ $pushup->id }}">{{ $pushup->comment }}</a>"</i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div><!-- col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->

    @include ('layouts.highcharts')
@endsection