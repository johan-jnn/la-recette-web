@props([
    'heading',
    'links' => [],
])

<div class="flex flex-col gap-5">
    <h3 class="text-base font-semibold">{{ $heading }}</h3>
    <ul class="flex flex-col gap-5">
        @foreach ($links as $link)
            <li>
                <a
                    href="{{ $link['url'] }}"
                    class="inline-flex items-center gap-1 text-sm hover:underline"
                    @if (!empty($link['external'])) target="_blank" rel="noopener noreferrer" @endif
                >
                    {{ $link['label'] }}
                    @if (!empty($link['external']))
                        <x-ui.icon name="arrow-up-right" size="w-2.5 h-2.5" />
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</div>
