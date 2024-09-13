<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Route::has('login')) @auth Welcome Back,
                    {{ Auth::user()->name }}! @else
                    <!-- Tampilkan pesan atau tautan login/daftar jika pengguna belum masuk -->
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth @endif

                    <div>
                        @foreach ($posts as $post)
                        <article class="py-8 max-w-screen-md border-b border-gray-300">
                            <h2
                                class="mb-1 text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{$post['title']}}</h2>
                            <div>
                                <a href="#">{{$post['author']}}</a>
                                |
                                {{$post->created_at->diffForHumans()}}
                            </div class="text-base text-gray-500">
                            <p class="font-light my-4">
                                {{Str::limit($post['body'],100)}}
                            </p>
                            <a
                                class="font-medium text-blue-500 hover:underline "
                                href="/posts/{{$post['slug']}}">Read More &raquo;</a>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>