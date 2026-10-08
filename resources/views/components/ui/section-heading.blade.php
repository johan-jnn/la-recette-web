@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left', // left, center
    'spacing' => 'mb-12',
])

{{-- En-tête de section : sur-titre, titre, description et actions optionnelles (slot) --}}
<div {{ $attributes->merge(['class' => "{$spacing} flex flex-col gap-4 " . ($align === 'center' ? 'items-center text-center' : 'md:flex-row md:justify-between md:items-end')]) }}>
    <div>
        @if ($eyebrow)
            <x-ui.eyebrow>{{ $eyebrow }}</x-ui.eyebrow>
        @endif

        <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight">
            {{ $title }}
        </h2>

        @if ($description)
            <p class="text-base text-[#626262] mt-3 {{ $align === 'center' ? 'max-w-2xl mx-auto' : '' }}">
                {{ $description }}
            </p>
        @endif
    </div>

    @if ($slot->isNotEmpty())
        <div class="flex items-center gap-3 shrink-0">
            {{ $slot }}
        </div>
    @endif
</div>
