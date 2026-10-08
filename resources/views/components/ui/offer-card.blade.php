@props([
    'number' => null,
    'title',
    'items' => [],
])

{{-- Carte d'offre numérotée : numéro, titre et liste de prestations --}}
<div {{ $attributes->merge(['class' => 'p-8 rounded-card bg-cream flex flex-col gap-5 text-forest']) }}>
    @if ($number)
        <p class="text-quote font-bold text-sage">{{ $number }}</p>
    @endif

    <h3 class="text-subtitle font-bold">{{ $title }}</h3>

    <ul class="flex flex-col gap-3">
        @foreach ($items as $item)
            <li class="flex gap-3 text-base leading-[1.55] text-muted">
                <span aria-hidden="true" class="mt-2 size-2 shrink-0 rounded-pill bg-rose"></span>
                {{ $item }}
            </li>
        @endforeach
    </ul>
</div>
