<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Livewire</title>

    </head>
    <body class="antialiased">
        <h1 class="text-xl text-green-600"> <a href={{ route('contact.show')}}>Contact Form</a></h1>
        <h1 class="text-xl text-green-600"> <a href={{ route('search-dropdown')}}>Search Dropown</a></h1>
        <h1 class="text-xl text-green-600"> <a href={{ route('users-table')}}>Users Table</a></h1>
    </body>
</html>
