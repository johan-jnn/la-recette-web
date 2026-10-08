@props([
    'experiences' => null,
])

@php
    $experiences ??= \App\Models\Experience::query()->latest()->get();
    $themes = ['forest', 'rose', 'sun'];
@endphp

{{-- Mise en avant des expériences : une bande par expérience, couleurs alternées --}}
<section id="experiences" class="relative w-full overflow-hidden bg-white py-10">
    <div class="flex flex-col gap-[42px]">
        @forelse ($experiences as $experience)
            <div class="relative">
                <x-experiences.showcase :experience="$experience" :theme="$themes[$loop->index % count($themes)]" />

                @if ($loop->first)
                    {{-- Citron décoratif : au-dessus de la 1re bande, recouvert par la suivante --}}
                    <x-ui.decor name="citrus" width="474" height="447" class="left-[83.54%] top-[57.19%] w-[474px] h-[447px] hidden md:block" />
                @endif
            </div>
        @empty
            <div class="px-6 md:px-20">
                <x-ui.empty-state class="max-w-page mx-auto" message="De nouvelles expériences seront bientôt annoncées." />
            </div>
        @endforelse
    </div>
</section>
