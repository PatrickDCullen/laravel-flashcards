<x-app-layout :user="auth()->user()">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Flashcard Deck') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="flex justify-center pb-4">
                <x-auth-validation-errors :errors="$errors"/>
            </div>
        @endif

        <form action="{{ route('decks.update', [$deck->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex justify-center items-center space-x-4">
                <x-label for="topic"></x-label>
                <x-input
                    type="text"
                    id="topic"
                    name="topic"
                    placeholder="Change Topic Here"
                    required
                />

                <x-button>Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
