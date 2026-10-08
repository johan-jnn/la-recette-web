@props([
    'experiences' => null,
    'limit' => 3,
])

@php
    $experiences ??= \App\Models\Experience::query()->latest()->take($limit)->get();
@endphp

<x-layout.section id="experiences" padding="pt-16 md:pt-[72px] pb-16 md:pb-[90px]">
    <x-ui.section-heading title="Ateliers, food tours & immersions">
        <x-ui.button :url="route('experiences.index')" variant="outline">Toutes les expériences</x-ui.button>
    </x-ui.section-heading>

    <x-experiences.grid :experiences="$experiences" />
</x-layout.section>
