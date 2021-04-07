<x-app-layout :user="request()->route('user')" :deck="request()->route('deck')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Flashcard' }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-sm sm:px-6 lg:px-8">
            <div class="rounded border-2 bg-white border-gray-600 h-96 flex items-end mb-2">
                <p class="mx-auto font-sans pb-2">{{ $flashcard->term }} flashcard</p>
            </div>
            <div class="rounded border-2 bg-white border-gray-600 h-96 flex items-end">
                <p class="mx-auto font-sans pb-2">{{ $flashcard->definition }} flashcard</p>
            </div>
    </div>
</x-app-layout>
