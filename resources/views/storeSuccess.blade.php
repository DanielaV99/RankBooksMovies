<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:max-w-md max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-green-300 border-b border-gray-200">
                    Your item was successfully submitted!
                    <br />
                    It's under review by our administrators and it will be listed once it's approved.
                    <div class="mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('rank-items') }}">
                            {{ __('Go back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
