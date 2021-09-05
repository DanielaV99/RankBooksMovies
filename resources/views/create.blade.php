<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:max-w-md max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('item.store') }}">
                        @csrf
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="category" :value="__('Category')" />

                            <x-select id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" :options="$categories" required />
                        </div><div class="mt-4">
                            <x-label for="genre" :value="__('Genre')" />

                            <x-select id="genre" class="block mt-1 w-full" type="text" name="genre" :value="old('genre')" :options="$genres" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('rank-items') }}">
                                {{ __('Cancel') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
