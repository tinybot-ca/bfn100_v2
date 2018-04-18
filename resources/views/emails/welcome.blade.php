@component('mail::message')
# Hey, {{ $user->name }}!

No PAIN no GAIN! Time to get those reps in! You'll receive super-motivating email notifications whenever another member of BFN100 posts their daily results. (Don't worry, you can always [unsubscribe](https://www.youtube.com/watch?v=dQw4w9WgXcQ) from them.)

@component('mail::button', ['url' => env('APP_URL')])
Visit BFN100
@endcomponent

@component('mail::panel', ['url' => ''])
** Quick tips: ** You might feel tempted to rep out as many push-ups as possible. Don't do this. Take your time, take as many breaks as you need to, and do your best to get to 100 push-ups within a 24 hour period.

There is a maximum limit of 100 push-ups per day. This one rule has prevented countless injuries. Start small! If you can only manage 10 on a given day, that's 10 better than 0.

Good luck!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
