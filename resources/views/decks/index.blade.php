<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Flashcard Decks' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-5 gap-4">
            @foreach(Auth::user()->decks as $deck)
                <div class="rounded border-2 bg-white border-gray-600 h-64 flex items-end">
                    <p class="mx-auto font-sans pb-2">{{ $deck->topic }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
