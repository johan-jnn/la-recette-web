@props([
    'layout' => 'inline', // inline (barre de recherche de la page podcast), stacked (popup)
    'withSort' => false,
])

@php
    // Tranches de durée (colonne "duration" au format HH:MM:SS) — cf. sections/podcasts/episodes
    $durations = [
        'short' => 'Moins de 30 min',
        'medium' => 'De 30 min à 1 h',
        'long' => 'Plus d’1 h',
    ];

    $sorts = [
        'latest' => 'Les plus récents',
        'oldest' => 'Les plus anciens',
    ];

    $stacked = $layout === 'stacked';
@endphp

{{-- Recherche d'épisodes soumise en GET vers la page podcast (résultats filtrés dans sections/podcasts/episodes) --}}
<form
    action="{{ route('podcasts.index') }}#episodes"
    method="GET"
    x-data
    @submit="$el.querySelectorAll('input[name]').forEach(input => input.disabled = input.value === '')"
    {{ $attributes->merge(['class' => 'flex flex-col gap-4 text-forest']) }}
>
    <div @class([
        'flex flex-col gap-4',
        'md:flex-row md:items-end' => !$stacked,
    ])>
        <div class="flex-1">
            <x-forms.input-text name="q" label="Mot-clé ou invité" placeholder="Rechercher un titre, un nom…" :value="request('q')" />
        </div>

        <div @class(['md:w-[260px]' => !$stacked])>
            <x-forms.select name="duration" label="Durée" :options="$durations" :selected="request('duration')" placeholder="Toutes les durées" />
        </div>

        @if ($withSort)
            <div @class(['md:w-[260px]' => !$stacked])>
                <x-forms.select name="sort" label="Trier par" :options="$sorts" :selected="request('sort')" placeholder="Les plus récents" />
            </div>
        @elseif (request()->filled('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}" />
        @endif

        <x-forms.submit-button class="{{ $stacked ? 'self-start' : '' }}">Rechercher</x-forms.submit-button>
    </div>

    {{ $slot }}
</form>
