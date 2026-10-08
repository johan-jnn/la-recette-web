@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'center', // center, left
    'back' => null, // ['label' => ..., 'url' => ...]
])

{{-- Bandeau sombre d'en-tête de page --}}
<div class="w-full bg-[#171717] text-white pt-32 pb-16 md:pb-20 px-6 md:px-16">
    <div class="max-w-4xl mx-auto {{ $align === 'center' ? 'text-center' : '' }}">
        @if ($back)
            <a href="{{ $back['url'] }}" class="inline-flex items-center gap-1 text-xs font-semibold text-[#C8C8C8] hover:text-white mb-4">
                <x-ui.icon name="chevron-left" size="w-3 h-3" />
                {{ $back['label'] }}
            </a>
        @endif

        @if ($eyebrow)
            <x-ui.eyebrow tone="light" spacing="mb-3">{{ $eyebrow }}</x-ui.eyebrow>
        @endif

        <h1 class="text-4xl md:text-5xl font-semibold tracking-tight leading-tight mb-6">
            {{ $title }}
        </h1>

        @if ($description)
            <p class="text-base md:text-lg text-[#C8C8C8] leading-relaxed {{ $align === 'center' ? 'max-w-2xl mx-auto' : '' }}">
                {{ $description }}
            </p>
        @endif

        @if ($slot->isNotEmpty())
            <div class="mt-10">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>
