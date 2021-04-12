<x-app-layout :user="request()->route('user')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Flashcard Decks' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-5 gap-4">
            @foreach($user->decks as $deck)
                <a href="{{ route('decks.show', [$user->id, $deck->id]) }}">
                    <div class="rounded border-2 bg-white border-gray-600 h-64 flex items-end hover:border-gray-400">
                        <p class="mx-auto font-sans pb-2">{{ $deck->topic }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
