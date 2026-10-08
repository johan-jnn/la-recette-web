@props([
    'experiences' => null,
])

@php
    $experiences ??= \App\Models\Experience::query()->latest()->get();
@endphp

<x-layout.section bg="muted">
    <x-experiences.grid :experiences="$experiences" class="lg:gap-8" />
</x-layout.section>
