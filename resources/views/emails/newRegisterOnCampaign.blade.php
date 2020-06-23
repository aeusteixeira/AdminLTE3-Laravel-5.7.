@component('mail::message')
<h1>Olá, {{ $register->name }}!</h1>
<p> {{ $campaign->default_email_message }}</p>
@endcomponent
