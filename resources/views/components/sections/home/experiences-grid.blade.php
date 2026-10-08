@props([
    'experiences' => null,
    'limit' => 3,
])

@php
    $experiences ??= \App\Models\Experience::query()->latest()->take($limit)->get();
@endphp

<x-layout.section id="experiences">
    <x-ui.section-heading eyebrow="À vivre" title="Nos Expériences à partager">
        <x-ui.button :url="route('experiences.index')" variant="pill">
            Toutes les expériences ↗
        </x-ui.button>
    </x-ui.section-heading>

    <x-experiences.grid :experiences="$experiences" tone="muted" />
</x-layout.section>
