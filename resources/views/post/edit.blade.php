<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Livewire</title>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @livewireScripts
        <style>
            progress {
                border-radius: 7px;
            }

            progress::-webkit-progress-bar {
                background-color: lightgray;
                border-radius: 7px;
            }

            progress::-webkit-progress-value {
                background-color: blue;
                border-radius: 7px;
            }

        </style>
    </head>
    <div class="flex justify-center items-center h-screen">
            <livewire:post-edit :post="$post" />
    </div>
    @livewireStyles
</html>


