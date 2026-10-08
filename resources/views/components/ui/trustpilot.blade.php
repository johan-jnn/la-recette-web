@props([
    'score' => 'Excellent',
    'reviews' => 436,
])

@php
    // Note et nombre d'avis non disponibles en base : valeurs de la maquette.
    // Le lien utilise l'URL Trustpilot administrable dans Filament (Paramètres).
    $url = \App\Models\Setting::find(\App\Enums\Settings::TRUST_PILOT_URL->value)?->value;
@endphp

{{-- Widget Trustpilot "Micro Combo" --}}
<{{ $url ? 'a' : 'div' }}
    @if ($url) href="{{ $url }}" target="_blank" rel="noopener noreferrer" @endif
    {{ $attributes->merge(['class' => 'inline-flex flex-wrap items-center justify-center gap-x-[13px] gap-y-2 text-base leading-[26px] text-black']) }}
>
    <span class="font-bold">{{ $score }}</span>
    <img src="{{ asset('images/icons/trustpilot-stars.svg') }}" alt="5 étoiles sur 5" width="107" height="20" class="h-5 w-[106.67px]" />
    <span><strong class="font-bold">{{ $reviews }}</strong> reviews on</span>
    <span class="inline-flex items-center gap-1 font-bold">
        <img src="{{ asset('images/icons/trustpilot-star.svg') }}" alt="" width="14" height="13" class="h-[13.25px] w-3.5" />
        Trustpilot
    </span>
</{{ $url ? 'a' : 'div' }}>
