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
                        <p>
                            {{ $item->title }}
                            {{ $item->category->name }}
                            {{ $item->genre->name }}
                            {{ $item->createdBy->name }}
                            @if (count($item->userReviews))
                                @php
                                    $sumRanks = null;
                                @endphp
                                @foreach ($item->userReviews as $userReview)
                                    @php
                                        $sumRanks += $userReview->pivot->rank;
                                    @endphp
                                @endforeach
                                {{ $sumRanks/count($item->userReviews) }}
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
