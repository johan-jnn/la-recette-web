@props([
    'image' => null,
    'title',
    'description' => null,
])

{{-- Carte de présentation (équipe, intervenants) : portrait, rôle, courte description --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-5 text-forest']) }}>
    <x-ui.media :src="$image" :alt="$title" radius="rounded-image" class="h-[210px] w-full" />
    <h3 class="text-subtitle font-bold">{{ $title }}</h3>
    @if ($description)
        <p class="text-body-lg text-muted">{{ $description }}</p>
    @endif
</div>
