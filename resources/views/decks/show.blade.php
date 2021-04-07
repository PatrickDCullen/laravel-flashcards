<x-app-layout :user="request()->route('user')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Flashcard Deck' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-sm sm:px-6 lg:px-8">
        <a href="{{ route('flashcards.index', ['user' => $user->id, 'deck' => $deck->id]) }}">
            <div class="rounded border-2 bg-white border-gray-600 h-96 flex items-end">
                <p class="mx-auto font-sans pb-2">{{ $deck->topic }} deck</p>
            </div>
        </a>
    </div>
</x-app-layout>
