<x-navbar />
<div class="bg-indigo-100 flex justify-center h-screen">
    <div class="">
        <h1 class="flex justify-center text-lg font-bold my-4 text-gray-900 text-4xl border-indigo-700 border-b-2">Posts</h2>
        <ul class="space-y-4 max-w-md list-disc list-inside text-gray-500 list-none">
            @foreach ($posts as $post)
                <li class="text-lg text-bold border border-indigo-700 p-4 rounded rounded-xl bg-indigo-700 text-white hover:bg-indigo-500 "><a href="/post/{{ $post->id }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
