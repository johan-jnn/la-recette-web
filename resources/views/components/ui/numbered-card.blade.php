@props([
    'number',
    'title',
    'description' => null,
    'link' => null, // ['label' => ..., 'url' => ...]
    'tone' => 'forest', // forest, rose
])

{{-- Carte numérotée (offres du studio) : pastille, titre, description et lien --}}
<div {{ $attributes->merge(['class' => 'flex flex-col items-start gap-4 rounded-card px-5 py-10 ' . ($tone === 'rose' ? 'bg-rose text-forest' : 'bg-forest text-white')]) }}>
    <span class="flex size-10 items-center justify-center rounded-pill {{ $tone === 'rose' ? 'bg-white' : 'bg-cream' }} text-base font-semibold text-forest">{{ $number }}</span>

    <h3 class="text-subtitle font-semibold">{{ $title }}</h3>

    @if ($description)
        <p class="text-sm leading-[1.55]">{{ $description }}</p>
    @endif

    @if ($link)
        <a href="{{ $link['url'] }}" class="text-sm font-semibold underline underline-offset-4 hover:opacity-80">{{ $link['label'] }}</a>
    @endif
</div>
