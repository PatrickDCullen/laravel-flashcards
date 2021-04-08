<x-app-layout :user="request()->route('user')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Flashcard Deck' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-sm sm:px-6 lg:px-8">
        <a href="{{ route('flashcards.index', ['user' => $user->id, 'deck' => $deck->id]) }}">
            <div class="min-w-full rounded border-2 bg-white border-gray-600 h-96 flex items-end">
                <p class="mx-auto font-sans pb-2">{{ $deck->topic }} deck</p>
            </div>
        </a>
        <a href="{{ route('decks.edit', ['user' => $user->id, 'deck' => $deck->id ]) }}">
            <x-button class="mt-2" type="button"> Edit deck name </x-button>
        </a>
        {{-- This is where you add a button to delete --}}
        <form class="mt-2" action="{{ route('decks.destroy', ['user' => $user, 'deck' => $deck]) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button> Delete deck </x-button>
        </form>
    </div>


</x-app-layout>
