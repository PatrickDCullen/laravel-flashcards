<x-app-layout :user="Auth::user()">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div>
        @isset($deck)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-button type="button" class="bg-blue-700 hover:bg-blue-500">
                            <a href="{{route('flashcards.showFront', [$user, $deck, $flashcard])}}">Quiz me</a>
                        </x-button>
                    </div>
                </div>
            </div>
        @endisset
    </div>
</x-app-layout>
