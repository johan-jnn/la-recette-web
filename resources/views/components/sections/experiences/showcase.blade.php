@props([
    'experiences' => null,
])

@php
    $experiences ??= \App\Models\Experience::query()->latest()->get();
    $themes = ['forest', 'rose', 'sun'];
@endphp

{{-- Mise en avant des expériences : une bande par expérience, couleurs alternées --}}
<section id="experiences" class="relative w-full bg-white pb-[100px]">
    <div class="flex flex-col gap-[62px]">
        @forelse ($experiences as $experience)
            <x-experiences.showcase :experience="$experience" :theme="$themes[$loop->index % count($themes)]" />
        @empty
            <div class="px-6 md:px-20 py-10">
                <x-ui.empty-state class="max-w-page mx-auto" message="De nouvelles expériences seront bientôt annoncées." />
            </div>
        @endforelse
    </div>
</section>
