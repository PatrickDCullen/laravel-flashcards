<x-app-layout :user="request()->route('user')" :deck="request()->route('deck')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{  __('Add Flashcards') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('term'))
            <div class="flex justify-center pb-4">
                <p class="">Flashcard for <b>{{ session('term') }}</b> created.</p>
            </div>
        @endif

        <form action="{{ route('flashcards.store', [$user->id, $deck->id]) }}" method="POST">
            @csrf

            <div class="flex justify-center items-center space-x-4">
                <input
                    class="rounded"
                    type="text"
                    id="term"
                    name="term"
                    placeholder="New Flashcard Term"
                    required
                >

                <input
                    class="rounded"
                    type="text"
                    id="definition"
                    name="definition"
                    placeholder="New Flashcard Definition"
                    required
                >

                <button class="bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded text-white font-semibold" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
