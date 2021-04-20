<x-app-layout :user="auth()->user()" :deck="request()->route('deck')">
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Flashcard' }}
            </h2>

            <a href="{{ route('flashcards.edit', ['user' => $user->id, 'deck' => $deck->id, 'flashcard' => $flashcard->id]) }}">
                <x-button class="bg-blue-700 hover:bg-blue-500" type="button"> Edit flashcard </x-button>
            </a>

            <form
                action="{{ route('flashcards.destroy', ['user' => $user, 'deck' => $deck, 'flashcard' => $flashcard]) }}" method="POST"
            >
                @csrf
                @method('DELETE')

                <x-button class="bg-blue-700 hover:bg-blue-500"> Delete flashcard </x-button>
            </form>
        </div>
    </x-slot>

    <div class="py-12 mx-auto max-w-sm sm:px-6 lg:px-8">
        @if (session('term'))
            <p>Term is now <b>{{ session('term') }}</b>.</p>
        @endif

        @if (session('definition'))
            <p>Definition is now <b>{{ session('definition') }}</b>.</p>
        @endif

        {{ $slot }}
    </div>
</x-app-layout>
