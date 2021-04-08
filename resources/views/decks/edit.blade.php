<x-app-layout :user="request()->route('user')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Flashcard Deck') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{-- @if (session('topic'))
            <div class="flex justify-center pb-4">
                <p class="">Flashcard deck for <b>{{ session('topic') }}</b> created.</p>
            </div>
        @endif --}}

        <form action="{{ route('decks.update', [$user->id, $deck->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex justify-center items-center space-x-4">
                <input
                    class="rounded"
                    type="text"
                    id="topic"
                    name="topic"
                    placeholder="New Flashcard Topic"
                    required
                >

                <button class="bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded text-white font-semibold" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
