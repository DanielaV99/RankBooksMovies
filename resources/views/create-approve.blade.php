<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve Created Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($items as $item)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-wrap">
                            <div>
                                <div class="flex flex-wrap">
                                    <p class="font-bold">
                                        <a href="{{ route('item.show', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </p>
                                    <div class="ml-2">
                                        @if ($item->category->name === 'movie')
                                            <x-movie-icon></x-movie-icon>
                                        @elseif ($item->category->name === 'book')
                                            <x-book-icon></x-book-icon>
                                        @endif
                                    </div>
                                    <span class="ml-2 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                        {{ $item->genre->name }}
                                    </span>
                                </div>
                                <div class="text-xs font-thin">
                                    Item created by: {{ $item->createdBy->name }}
                                </div>
                            </div>

                            <div class="flex flex-grow items-center justify-end flex-wrap">
                                <form method="POST" action="{{ route('item.create.approve.store') }}">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}"/>
                                    <x-button class="ml-4">
                                        {{ __('Approve') }}
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
