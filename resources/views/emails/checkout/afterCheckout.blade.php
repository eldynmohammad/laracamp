@component('mail::message')
# Register Camp

Hi, {{ $checkout->user->name }}.
<br>
Thank you for register on {{ $checkout->camp->title }}. To see your registered classes check on:

@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
