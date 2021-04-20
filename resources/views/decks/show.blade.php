<x-app-layout :user="auth()->user()">
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Flashcard Deck' }}
            </h2>

            <a href="{{ route('decks.edit', ['deck' => $deck->id ]) }}">
                <x-button class="bg-blue-700 hover:bg-blue-500" type="button"> Edit deck name </x-button>
            </a>

            <form action="{{ route('decks.destroy', ['user' => $user, 'deck' => $deck]) }}" method="POST">
                @csrf
                @method('DELETE')

                <x-button class="bg-blue-700 hover:bg-blue-500"> Delete deck </x-button>
            </form>
        </div>
    </x-slot>

    <div class="py-12 mx-auto max-w-sm sm:px-6 lg:px-8">
        @if (session('topic'))
            <div class="pb-4">
                <p class="">Flashcard deck topic updated to <b>{{ session('topic') }}</b>. </p>
            </div>
        @endif

        <a href="{{ route('flashcards.index', ['deck' => $deck->id]) }}">
            <div class="min-w-full rounded border-2 bg-white border-gray-600 h-96 flex items-end hover:border-gray-400">
                <p class="mx-auto font-sans pb-2">{{ $deck->topic }} deck</p>
            </div>
        </a>
    </div>


</x-app-layout>
