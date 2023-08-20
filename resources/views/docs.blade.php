<x-layout>
    <x-slot name="header">
        {{ __('Docs') }}
    </x-slot>

    <x-panel>
        <h1 class="text-2xl">{{ __('Hi developer!') }}</h1>
        <p class="text-lg mt-2">{{ __('You\'ll find the docs at ') }}<a target="_blank" class="underline" href="https://splade.dev/docs">splade.dev/docs</a></p>
    </x-panel>
</x-layout>