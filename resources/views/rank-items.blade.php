<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rank Items') }}
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
                                @php
                                    $sumRanks = null;
                                    $hasReviewed = false;
                                    foreach ($item->userReviews as $userReview) {
                                        $sumRanks += $userReview->pivot->rank;
                                        if ($userReview->pivot->user_id === $currentUserId) {
                                            $hasReviewed = true;
                                        }
                                    }
                                @endphp
                                <div class="flex flex-grow items-center justify-end flex-wrap">
                                    @if (count($item->userReviews))
                                        <div class="w-full flex flex-grow items-center justify-end">
                                            <x-rank :rank="$sumRanks/count($item->userReviews)"></x-rank>
                                        </div>
                                    @endif
                                </div>
                                @if (count($item->userReviews))
                                    <p class="mb-4 w-full text-xs font-thin flex flex-grow items-center justify-end">
                                        {{ 'Reviews: ' . count($item->userReviews) }}
                                    </p>
                                @endif
                                @if (!$hasReviewed)
                                    <a href="{{ route('item.review.create', $item->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Add Review') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
