@component('mail::message')
# Register Camp

Hi, {{ $checkout->user->name }}.
<br>
Thank you for register on {{ $checkout->camp->title }}. Please see payment instructions by click the button below:

@component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
Get Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
