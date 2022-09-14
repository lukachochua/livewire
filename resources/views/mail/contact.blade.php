@component('mail::message')
# Contact From {{ $name }}

{{ $message }}.

@component('mail::button', ['url' => 'github.com/lukachochua'])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
