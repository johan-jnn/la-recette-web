@props([
    'nav' => null,
    'cta' => null,
    'sticky' => true,
])

@php
    // Liens principaux : 'route' sert aussi à détecter la page active
    $nav ??= [
        ['label' => 'Podcast', 'route' => 'articles.index'],
        ['label' => 'Expériences', 'route' => 'experiences.*', 'url' => route('experiences.index')],
        ['label' => 'À propos', 'route' => 'about'],
    ];

    $cta ??= ['label' => 'Nous contacter', 'url' => route('contact.index')];
@endphp

<header class="{{ $sticky ? 'sticky' : 'fixed' }} top-0 left-0 w-full z-50 px-4 md:px-8 py-3 md:py-4 transition-all" x-data="{ open: false }">
    <div class="max-w-6xl mx-auto px-6 py-3.5 rounded-2xl bg-[#F6F4E4]/95 backdrop-blur-md border border-[#E8E4D0] shadow-sm">
        <div class="flex justify-between items-center gap-6">
            <x-layout.logo class="text-lg text-[#1C4937]" />

            <nav class="hidden md:flex items-center gap-6 lg:gap-8">
                @foreach ($nav as $item)
                    <x-layout.nav-link :url="$item['url'] ?? route($item['route'])" :active="request()->routeIs($item['route'])">
                        {{ $item['label'] }}
                    </x-layout.nav-link>
                @endforeach
            </nav>

            <div class="flex items-center gap-3">
                <a
                    href="{{ $cta['url'] }}"
                    class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-[#1C4937] text-white text-sm font-semibold hover:bg-[#143628] transition-colors shadow-sm"
                >
                    {{ $cta['label'] }}
                </a>

                {{-- Menu mobile --}}
                <button
                    type="button"
                    class="md:hidden w-10 h-10 flex items-center justify-center rounded-full text-[#1C4937] cursor-pointer"
                    @click="open = !open"
                    :aria-expanded="open"
                    aria-label="Ouvrir le menu"
                >
                    <x-ui.icon name="chevron-down" size="w-5 h-5" class="transition-transform" x-bind:class="open ? 'rotate-180' : ''" />
                </button>
            </div>
        </div>

        <nav class="md:hidden flex flex-col gap-4 pt-4 mt-4 border-t border-[#E8E4D0]" x-show="open" x-transition style="display: none;">
            @foreach ($nav as $item)
                <x-layout.nav-link :url="$item['url'] ?? route($item['route'])" :active="request()->routeIs($item['route'])">
                    {{ $item['label'] }}
                </x-layout.nav-link>
            @endforeach
            <x-layout.nav-link :url="$cta['url']">{{ $cta['label'] }}</x-layout.nav-link>
        </nav>
    </div>
</header>
