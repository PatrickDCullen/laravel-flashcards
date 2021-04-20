<x-app-layout :user="auth()->user()" :deck="request()->route('deck')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucwords($deck->topic) . ' Flashcard Deck' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if ($deck->flashcards->isEmpty())
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You haven't created any flashcards for this deck yet!
                </div>
            </div>
        @endif
        <div class="grid grid-cols-5 gap-4">
            @foreach($deck->flashcards as $flashcard)
                <a href="{{ route('flashcards.showFront', ['deck' => $deck, 'flashcard' => $flashcard]) }}">
                    <div class="rounded border-2 bg-white border-gray-600 h-64 flex items-end hover:border-gray-400">
                        <p class="mx-auto font-sans pb-2">{{ $flashcard->term }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
