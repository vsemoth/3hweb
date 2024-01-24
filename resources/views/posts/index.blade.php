<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex justify-between">
                {{ __('Posts Index') }} <p><a style="padding: 10px; border-radius: 5px; background-color: #777; color: #fff;" href="{{ route('posts.create') }}" class="pr">New</a></p>
            </div>
        </h1>
    </x-slot>

    @foreach($posts as $post)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <h1>{{ __($post->post_title) }}</h1>
                            </a>
                            <a href="{{ route('posts.edit',$post->id) }}" style="padding: 10px; border-radius: 5px; background-color: #777; color: #fff;">
                                Edit Post
                            </a>
                        </div>
                        <hr>
                        {!! __(Str::words($post->post_content, 150)) !!}
                        <br>
                        <p>Post by: {{ $post->post_author }}
                        <hr>
                        <span>{{ $post->post_tags }}</span>
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
