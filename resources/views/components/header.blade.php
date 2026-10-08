@props([
    'nav' => null,
    'cta' => null,
    'useSticky' => true,
    'here' => null,
])

@php
    if ($nav === null) {
        $nav = [
            'Podcast' => '#podcasts',
            'Studio' => '#studio',
            'Expériences' => route('experiences.index'),
            'Découvrez la Maison' => route('about'),
        ];
    }

    if ($cta === null) {
        $cta = [
            'Nous contacter' => '#contact',
        ];
    }
@endphp

<header class="{{ $useSticky ? 'sticky' : 'fixed' }} top-0 left-0 w-full z-50 px-4 md:px-8 py-3 md:py-4 transition-all">
    <div class="max-w-6xl mx-auto flex justify-between items-center gap-6 px-6 py-3.5 rounded-2xl bg-[#F6F4E4]/95 backdrop-blur-md border border-[#E8E4D0] shadow-sm">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-decoration-none group">
            <span class="font-extrabold text-lg tracking-tight uppercase text-[#1C4937] leading-none">
                {{ env('APP_NAME', 'Maison La Recette') }}
            </span>
        </a>

        {{-- Liens de navigation --}}
        <nav class="hidden md:flex items-center gap-6 lg:gap-8">
            @foreach ($nav as $label => $url)
                <a
                    href="{{ $url }}"
                    class="text-sm font-semibold text-[#171717] hover:text-[#1C4937] transition-colors {{ $label == $here ? 'text-[#1C4937] underline underline-offset-4' : '' }}"
                >
                    {{ $label }}
                </a>
            @endforeach
        </nav>

        {{-- CTA Button Figma (Vert foncé #1C4937, rounded 30px, texte blanc) --}}
        <div class="flex items-center">
            @foreach ($cta as $label => $url)
                <a
                    href="{{ $url }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-full bg-[#1C4937] text-white text-sm font-semibold hover:bg-[#143628] transition-colors shadow-sm"
                >
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>
</header>
