<x-app-layout :user="auth()->user()" :deck="request()->route('deck')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Flashcard') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="flex justify-center pb-4">
                <x-auth-validation-errors :errors="$errors"/>
            </div>
        @endif

        <form action="{{ route('flashcards.update', [$deck->id, $flashcard->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center space-y-2 mx-auto">
                <x-label for="term"></x-label>
                <x-input
                    type="text"
                    id="term"
                    name="term"
                    placeholder="Change Term Here"
                    required
                />

                <x-label for="definition"></x-label>
                <x-textarea
                    type="text"
                    id="definition"
                    name="definition"
                    placeholder="Change Definition Here"
                    required
                >
                </x-textarea>

                <x-button>Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
