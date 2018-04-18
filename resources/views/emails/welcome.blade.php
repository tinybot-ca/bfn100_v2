@component('mail::message')
# Introduction

The body of your message. User's name is {{ $user->name }}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
This is a mail panel!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
