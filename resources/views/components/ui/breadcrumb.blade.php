@props([
    'items' => [], // [['label' => ..., 'url' => ...], ...] — le dernier élément est la page courante
])

<nav aria-label="Fil d’Ariane" {{ $attributes->merge(['class' => 'text-sm leading-[1.55] text-muted']) }}>
    <ol class="flex flex-wrap items-center gap-1">
        @foreach ($items as $item)
            <li class="flex items-center gap-1">
                @if (!$loop->last && !empty($item['url']))
                    <a href="{{ $item['url'] }}" class="hover:text-forest hover:underline">{{ $item['label'] }}</a>
                    <span aria-hidden="true">/</span>
                @else
                    <span aria-current="page">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
