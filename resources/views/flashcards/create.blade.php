<x-app-layout :user="auth()->user()" :deck="request()->route('deck')">
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

        @if ($errors->any())
            <div class="flex justify-center pb-4">
                <x-auth-validation-errors :errors="$errors"/>
            </div>
        @endif

        <form action="{{ route('flashcards.store', [$deck->id]) }}" method="POST">
            @csrf

            <div class="flex flex-col items-center space-y-2 mx-auto">
                <x-label for="term"></x-label>
                <x-input
                    type="text"
                    id="term"
                    name="term"
                    placeholder="New Flashcard Term"
                    required
                />

                <x-label for="definition"></x-label>
                <x-textarea
                    type="text"
                    id="definition"
                    name="definition"
                    placeholder="New Flashcard Definition"
                    required
                >
                </x-textarea>


                <x-button class="bg-blue-700 hover:bg-blue-500">Submit</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
