<x-app-layout :user="auth()->user()">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Flashcard Decks') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('topic'))
            <div class="flex justify-center pb-4">
                <p class="">Flashcard deck for <b>{{ session('topic') }}</b> created.</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="flex justify-center pb-4">
                <x-auth-validation-errors :errors="$errors"/>
            </div>
        @endif

        <form action="{{ route('decks.store') }}" method="POST">
            @csrf

            <div class="flex justify-center items-center space-x-4">
                <label for="topic""></label>
                <x-input
                    type="text"
                    id="topic"
                    name="topic"
                    placeholder="Topic For New Deck"
                    required
                />

                <x-button class="bg-blue-700 hover:bg-blue-500">Submit</x-button>
        </form>
    </div>
</x-app-layout>
