<x-layout :user="$user">
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="grid gap-8 lg:grid-cols-3">
        
        {{-- @if (count($posts) == 0)
        <a href="">tidak ada artikel</a> 
        @else --}}
        @foreach ($posts as $post)
        <article
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-5 text-gray-500">
                <span
                    class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    <svg
                        class="mr-1 w-3 h-3"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                    </svg>
                    Tutorial
                </span>
                <span class="text-sm">{{$post->created_at->diffForHumans()}}</span>
            </div>
            <h2
                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <a href="/posts/{{$post['slug']}}">{{$post->title}}</a>
            </h2>
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                {!! Str::limit(strip_tags($post->body), 100) !!}

            </p>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img
                        class="w-7 h-7 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                        alt="{{$post->author->name}}"/>
                    <a href="/posts/authors/{{$post->author->name}}" class="font-medium dark:text-white" >
                        {{$post->author->name}}
                    </a>
                </div>
                <a
                    href="/posts/{{$post['slug']}}"
                    class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline dark:hover:text-white">
                    Read more
                    <svg
                        class="ml-2 w-4 h-4"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </article>
        @endforeach
        {{-- @endif --}}

      
    </div>
</x-layout>