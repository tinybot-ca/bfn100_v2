@component('mail::message')

Date: {{ $pushup->datetime->toDayDateTimeString() }}

Name: {{ $pushup->user->name }}

Push-ups: {{ $pushup->amount }}

@if ( $pushup->comment )

@component('mail::panel', ['url' => ''])
{{ $pushup->comment }}
@endcomponent

@endif

@component('mail::button', ['url' => url('/')])
View Stats
@endcomponent

@endcomponent
