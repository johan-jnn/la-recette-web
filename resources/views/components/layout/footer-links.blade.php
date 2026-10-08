@props([
    'heading',
    'links' => [],
])

<div>
    <h3 class="text-xs uppercase tracking-widest font-semibold text-white/40 mb-5">
        {{ $heading }}
    </h3>
    <ul class="space-y-3">
        @foreach ($links as $link)
            <li>
                <a
                    href="{{ $link['url'] }}"
                    class="text-sm text-white/65 hover:text-white transition-colors"
                    @if (!empty($link['external'])) target="_blank" rel="noopener noreferrer" @endif
                >
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
