<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="category_name" value="Category Name" />
                            <x-text-input id="category_name" name="name" type="text" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:bg-gray-900 dark:text-gray-100" />
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="category_slug" value="Slug" />
                            <x-text-input id="category_slug" name="slug" type="text" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:bg-gray-900 dark:text-gray-100" />
                            @error('slug')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-input-label for="category_description" value="Description" />
                            <textarea id="category_description" name="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 dark:bg-gray-900 dark:text-gray-100"></textarea>
                            @error('description')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 transition">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
