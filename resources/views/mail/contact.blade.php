@component('mail::message')
# Contact From {{ $name }}

{{ $message }}.

If you need anything you can reach me on my personal number - {{ $phone }}

@component('mail::button', ['url' => 'github.com/lukachochua'])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
