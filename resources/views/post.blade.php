<x-layout :user="$user">
    <x-slot:title>{{$title}}</x-slot:title>
    <div class='flex flex-col border border-gray-500 rounded-xl w-70 items-center px-4'>
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{$post['title']}}</h2>
            <div>
                <a href="/posts/authors/{{$post->author->id}}">{{$post->author->name}}</a>
                |
                {{$post->created_at->diffForHumans()}}
            </div class="text-base text-gray-500">
            <p class="font-light my-4">
                {!! $post['body']!!}
            </p>
            <a
                class="font-medium text-blue-500 hover:underline "
                href="/posts">&laquo; Back to Posts</a>
        </article>
    </div>

</x-layout>