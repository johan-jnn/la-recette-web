@props([
    'nav' => null,
    'cta' => null,
    'sticky' => true,
])

@php
    use Illuminate\Support\Facades\Route;

    // "pattern" sert à détecter la page active ; les pages pas encore créées pointent vers "#"
    $nav ??= [
        ['label' => 'Podcast', 'url' => route('podcasts.index'), 'pattern' => 'podcasts.*'],
        ['label' => 'Studio', 'url' => Route::has('studio') ? route('studio') : '#', 'pattern' => 'studio'],
        ['label' => 'Expériences', 'url' => route('experiences.index'), 'pattern' => 'experiences.*'],
        ['label' => 'Découvrez la Maison', 'url' => route('about'), 'pattern' => 'about'],
        ['label' => 'Blog', 'url' => route('articles.index'), 'pattern' => 'articles.*'],
    ];

    $cta ??= ['label' => 'Nous contacter', 'url' => route('contact.index')];
@endphp

<header
    class="{{ $sticky ? 'sticky' : 'relative' }} top-0 z-50 w-full bg-cream"
    data-site-header
    x-data="{ open: false }"
>
    <div class="flex h-[94px] items-center justify-between gap-6 pl-6 pr-4 md:pl-[77px] md:pr-8">
        <x-layout.logo />

        <nav class="hidden lg:flex items-center gap-[26px]" aria-label="Navigation principale">
            @foreach ($nav as $item)
                <x-layout.nav-link :url="$item['url']" :active="$item['pattern'] && request()->routeIs($item['pattern'])">
                    {{ $item['label'] }}
                </x-layout.nav-link>
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            <x-ui.button :url="$cta['url']" variant="forest" class="hidden sm:inline-flex">
                {{ $cta['label'] }}
            </x-ui.button>

            <button
                type="button"
                class="lg:hidden flex size-11 items-center justify-center rounded-pill text-forest cursor-pointer"
                @click="open = !open"
                :aria-expanded="open"
                aria-label="Ouvrir le menu"
            >
                <x-ui.icon name="chevron-down" size="w-6 h-6" class="transition-transform" x-bind:class="open ? 'rotate-180' : ''" />
            </button>
        </div>
    </div>

    <nav class="lg:hidden flex flex-col gap-4 px-6 pb-6" x-show="open" x-transition x-cloak aria-label="Navigation mobile">
        @foreach ($nav as $item)
            <x-layout.nav-link :url="$item['url']" :active="$item['pattern'] && request()->routeIs($item['pattern'])">
                {{ $item['label'] }}
            </x-layout.nav-link>
        @endforeach
        <x-ui.button :url="$cta['url']" variant="forest" class="sm:hidden self-start">{{ $cta['label'] }}</x-ui.button>
    </nav>
</header>
