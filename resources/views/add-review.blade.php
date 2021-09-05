<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Review for ') . $item->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:max-w-md max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('item.review.store') }}">
                        @csrf
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                        <div>
                            <x-label for="rank" :value="__('Rank')" />

                            <x-input id="rank" class="block mt-1 w-full" type="number" min="1" max="10" name="rank" :value="old('rank')" required autofocus />
                            @error('rank')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-label for="comment" :value="__('Comment')" />

                            <x-textarea name="comment" class="block mt-1 w-full" :value="old('comment')" required>
                            </x-textarea>
                            @error('comment')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
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
