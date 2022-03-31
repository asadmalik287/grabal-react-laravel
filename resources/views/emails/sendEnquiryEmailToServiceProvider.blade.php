@component('mail::message')
    Hi {{$data['user']->name}}
    <br>
    {{$data['message']}}
    @component('mail::button', ['url' => url("/")]) Visit Now @endcomponent

    Thanks
    {{ config('app.name') }}
@endcomponent
