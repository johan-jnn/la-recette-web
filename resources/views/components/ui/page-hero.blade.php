@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left', // left, center
    'back' => null, // ['label' => ..., 'url' => ...]
    'image' => null,
])

{{-- En-tête de page (pages internes) : bandeau vert foncé ou photo, bord inférieur découpé --}}
<section class="relative overflow-hidden {{ $image ? '' : 'bg-forest' }} text-white px-6 md:px-20 pt-20 pb-24 md:pt-28 md:pb-32">
    @if ($image)
        <div aria-hidden="true" class="absolute inset-0">
            <x-ui.image :src="$image" alt="" :lazy="false" />
            <div class="absolute inset-0 bg-black/25"></div>
        </div>
    @endif

    <div class="relative max-w-page mx-auto flex flex-col gap-7 {{ $align === 'center' ? 'items-center text-center' : '' }}">
        @if ($back)
            <a href="{{ $back['url'] }}" class="inline-flex items-center gap-1 text-sm font-semibold text-white/80 hover:text-white">
                <x-ui.icon name="chevron-left" size="w-3.5 h-3.5" />
                {{ $back['label'] }}
            </a>
        @endif

        @if ($eyebrow)
            <p class="text-sm font-semibold uppercase">{{ $eyebrow }}</p>
        @endif

        <h1 class="text-4xl md:text-[3.5rem] font-bold leading-[1.08] max-w-4xl">{{ $title }}</h1>

        @if ($description)
            <p class="text-lead max-w-2xl">{{ $description }}</p>
        @endif

        @if ($slot->isNotEmpty())
            <div>{{ $slot }}</div>
        @endif
    </div>

    <x-ui.wave class="bottom-0" />
</section>
