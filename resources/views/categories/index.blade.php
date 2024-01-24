<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex justify-between">
                {{ __('Categories Index') }} <p><a style="padding: 10px; border-radius: 5px; background-color: #777; color: #fff;" href="{{ route('categories.create') }}" class="pr">New</a></p>
            </div>
        </h1>
    </x-slot>

    @foreach($categories as $category)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between">
                            <a href="{{ route('categories.show', $category->id) }}">
                                <h1>{{ __($category->category_name) }}</h1>
                            </a>
                            <a href="{{ route('categories.edit',$category->id) }}" style="padding: 10px; border-radius: 5px; background-color: #777; color: #fff;">
                                Edit Category
                            </a>
                        </div>
                        <hr>
                        
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
