<x-show :user="auth()->user()" :deck="request()->route('deck')" :flashcard="request()->route('flashcard')">
    <div class="rounded border-2 bg-white border-gray-600 h-96
        flex items-end
        mb-2">
        <p class="mx-auto font-sans pb-2">{{ $flashcard->term }}</p>
    </div>
    <div class="flex">
        <a
            href="{{route('flashcards.showBack', ['deck' => $deck, 'flashcard' => $flashcard]) }}"
            class="mx-auto"
        >
            <x-button>
                Flip
            </x-button>
        </a>
    </div>
</x-show>
