<x-app-layout :user="request()->route('user')" :deck="request()->route('deck')">
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

        <form action="{{ route('flashcards.update', [$user->id, $deck->id, $flashcard->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex justify-center items-center space-x-4">
                <x-label for="term"></x-label>
                <x-input
                    type="text"
                    id="term"
                    name="term"
                    placeholder="Change Term Here"
                    required
                />

                <x-label for="definition"></x-label>
                <x-input
                    type="text"
                    id="definition"
                    name="definition"
                    placeholder="Change Definition Here"
                    required
                />

                <x-button class="bg-blue-700 hover:bg-blue-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
