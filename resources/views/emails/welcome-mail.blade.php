@component('mail::message')
# Welcome {{ $user->username }} to Kerogram

Welcome to Kerogram photosharing
Share with Responsbility

@component('mail::button', ['url' => url("/profile/{$user->id}")])
View Profile
@endcomponent

Thanks for joining,<br>
kerogram team
@endcomponent
