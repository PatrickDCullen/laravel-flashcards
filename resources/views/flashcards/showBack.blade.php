<x-show :user="auth()->user()" :deck="request()->route('deck')" :flashcard="request()->route('flashcard')">
    <div class="rounded border-2 bg-white border-gray-600 h-96
        flex items-end
        mb-2">
        <p class="mx-auto font-sans pb-2">{{ $flashcard->definition }}</p>
    </div>
    <div class="flex">
        @isset($next)
            <a
                href="{{route('flashcards.showFront',
                    ['deck' => $deck, 'flashcard' => $next]) }}"
                class="mx-auto"
            >
                <x-button>
                    Next
                </x-button>
            </a>
        @endisset

        @empty($next)
            <a
                href="{{route('flashcards.showFront',
                    ['deck' => $deck, 'flashcard' => $first]) }}"
                class="mx-auto"
            >
                <x-button>
                    Restart Deck
                </x-button>
            </a>
        @endempty
    </div>
</x-show>
