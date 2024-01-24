
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2>{{ __('Edit Post') }}</h2>
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    <label for='post_title'>Title</label>
                    <input type="text" name="post_title" id="post_title" class="mb-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" value="{{ $post->post_title }}">

                    <textarea rows=15 name="post_content" id="mytextarea" class="mt-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="mytextarea">{{ $post->post_content }}</textarea>

                    <label for='post_author'>Author</label>
                    <input type="text" class="mt-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="post_author" id="post_author" value="{{ $post->post_author }}">

                    <label for='post_tags'>Tags</label>
                    <input type="text" class="mt-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" name="post_tags" id="post_tags" value="{{$post->post_tags}}">

                    <label for='category_id'>Category</label>
                        <select name="category_id" class="mt-5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                    @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                        </select>

                        @method('PUT')

                    <button type="submit" class="mt-10 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Update Post
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
</x-app-layout>

