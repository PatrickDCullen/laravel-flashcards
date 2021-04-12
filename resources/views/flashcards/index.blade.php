<x-app-layout :user="request()->route('user')" :deck="request()->route('deck')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucwords($deck->topic) . ' Flashcard Deck' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-5 gap-4">
            @forelse($deck->flashcards as $flashcard)
                <a href="{{ route('flashcards.show', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]) }}">
                    <div class="rounded border-2 bg-white border-gray-600 h-64 flex items-end hover:border-gray-400">
                        <p class="mx-auto font-sans pb-2">{{ $flashcard->term }}</p>
                    </div>
                </a>
            @empty
                <p>No flashcards created for this deck yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
