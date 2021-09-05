<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $item->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p id="category" class="block mt-1 w-full">
                        {{ __('Category') . ': ' . $item->category->name }}

                        @if ($item->category->name === 'movie')
                            <x-movie-icon></x-movie-icon>
                        @elseif ($item->category->name === 'book')
                            <x-book-icon></x-book-icon>
                        @endif
                    </p>
                    <p id="genre" class="block mt-1 w-full">
                        {{ __('Genre') . ': ' }}
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            {{ $item->genre->name }}
                        </span>
                    </p>
                    <div class="flex flex-grow items-center">
                        <span class="mr-4">
                            {{ __('Rank') . ': ' }}
                        </span>
                        @php
                            $sumRanks = null;
                            $hasReviewed = false;
                        @endphp
                        @if (count($item->userReviews))
                            @foreach ($item->userReviews as $userReview)
                                @php
                                    $sumRanks += $userReview->pivot->rank;
                                    if ($userReview->pivot->user_id === $currentUserId) {
                                        $hasReviewed = true;
                                    }
                                @endphp
                            @endforeach
                            <x-rank :rank="$sumRanks/count($item->userReviews)"></x-rank>
                        @endif
                    </div>
                    <p class="block mt-1 w-full">
                        {{ __('Item created by') . ': ' . $item->createdBy->name }}
                    </p>
                </div>
            </div>
        </div>

        @foreach($item->userReviews as $userReview)
            <div class="mt-6 w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="mb-4 block mt-1 w-full">
                            {{ __('Comment by') . ': ' . $userReview->name }}
                        </p>
                        <div class="flex flex-wrap">
                            <p>{{ $userReview->pivot->comment }}</p>
                            <div class="flex flex-grow items-center justify-end">
                                <x-rank :rank="$userReview->pivot->rank"></x-rank>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
