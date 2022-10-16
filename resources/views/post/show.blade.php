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
            <img src="{{ Storage::url($post->photo) }}"> 
            <div class="mt-8 ml-6">
                {{ $post->content }}
                <div class="px-2 py-2 w-48 rounded rounded-xl text-sm border border-green-800 mt-8 bg-indigo-600 text-white">Scroll down for comments...</div>
            </div>
        </div>
    </div>

    <livewire:comments-section :post="$post"/>


        <a href="{{ $post->id . '/edit'}}" class="flex justify-center items-center rounded rounded-md p-1 border border-blue-400 bg-cyan-300 hover:bg-cyan-500 m-auto w-32 mb-4">
            <div>
                EDIT
            </div>
        </a>
    @livewireScripts
</body>


