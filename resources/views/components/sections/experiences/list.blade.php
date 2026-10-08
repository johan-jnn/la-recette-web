@props([
    'experiences' => null,
])

@php
    $experiences ??= \App\Models\Experience::query()->latest()->get();
@endphp

<x-layout.section>
    <x-experiences.grid :experiences="$experiences" />
</x-layout.section>
