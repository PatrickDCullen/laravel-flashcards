<x-show :user="request()->route('user')" :deck="request()->route('deck')" :flashcard="request()->route('flashcard')">
    <div class="rounded border-2 bg-white border-gray-600 h-96
        flex items-end
        mb-2">
        <p class="mx-auto font-sans pb-2">{{ $flashcard->definition }}</p>
    </div>
    <div class="flex">
        @isset($next)
            <a
                href="{{route('flashcards.showFront',
                    ['user' => $user, 'deck' => $deck, 'flashcard' => $next]) }}"
                class="mx-auto"
            >
                <x-button class="bg-blue-700 hover:bg-blue-500">
                    Next
                </x-button>
            </a>
        @endisset

        @empty($next)
            <a
                href="{{route('flashcards.showFront',
                    ['user' => $user, 'deck' => $deck, 'flashcard' => $first]) }}"
                class="mx-auto"
            >
                <x-button class="bg-blue-700 hover:bg-blue-500">
                    Restart Deck
                </x-button>
            </a>
        @endempty
    </div>
</x-show>
