<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Post</title>
    @livewireStyles
</head>

<body>
    <div class="flex justify-center">
        <div class="my-8 ml-6 mr-6 py-4 border border-indigo-300 w-1/2 space-y-10 rounded-md bg-green-50">
            <h2 class="text-4xl bg-green-100 text-center px-2 py-2">{{ $post->title }}</h2>
            <div class="mt-8 ml-6">
                {{ $post->content }}
                <div class="px-2 py-2 w-48 rounded rounded-xl text-sm border border-green-800 mt-8 bg-indigo-600 text-white">Scroll down for comments...</div>
            </div>
        </div>
    </div>

    <livewire:comments-section :post="$post"/>
    @livewireScripts
</body>


