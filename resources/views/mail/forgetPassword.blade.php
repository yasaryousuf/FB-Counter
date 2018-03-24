@component('mail::message')
# Reset password

You have request a password reset!

@component('mail::panel', ['url' => ''])
Password reset tokens expire after one hour. If You didn't request for reset password please ignore this mail.
@endcomponent

@component('mail::button', ['url' => 'https://counter.linkingphase.com'])
Reset
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent