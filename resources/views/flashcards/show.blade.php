<x-app-layout :user="request()->route('user')" :deck="request()->route('deck')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Flashcard' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-sm sm:px-6 lg:px-8">
        @if (session('term'))
            <p>Term is now <b>{{ session('term') }}</b>.</p>
        @endif

        @if (session('definition'))
            <p>Definition is now <b>{{ session('definition') }}</b>.</p>
        @endif

        <div class="rounded border-2 bg-white border-gray-600 h-96 flex items-end mb-2">
            <p class="mx-auto font-sans pb-2">{{ $flashcard->term }}</p>
        </div>

        <div class="rounded border-2 bg-white border-gray-600 h-96 flex items-end">
            <p class="mx-auto font-sans pb-2">{{ $flashcard->definition }}</p>
        </div>

        <a href="{{ route('flashcards.edit', ['user' => $user->id, 'deck' => $deck->id, 'flashcard' => $flashcard->id]) }}">
            <div class="flex">
                <x-button class="mt-2 mx-auto" type="button"> Edit flashcard </x-button>
            </div>
        </a>

        <form
            class="mt-2"
            action="{{ route('flashcards.destroy', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]) }}" method="POST"
        >
            @csrf
            @method('DELETE')

            <div class="flex">
                <x-button class="mx-auto"> Delete flashcard </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
