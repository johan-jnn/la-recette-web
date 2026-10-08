@props([
    'action' => null,
])

@php
    // Tranches de durée (colonne "duration" au format HH:MM:SS)
    $durations = [
        'short' => 'Moins de 30 min',
        'medium' => 'De 30 min à 1 h',
        'long' => 'Plus d’1 h',
    ];
@endphp

{{-- Recherche d'épisodes : mot-clé + durée, soumis en GET --}}
<x-layout.section bg="white">
    <form action="{{ $action ?? route('podcasts.index') }}" method="GET" class="flex flex-col gap-8 text-forest">
        <h2 class="text-subtitle font-bold">Rechercher un épisode</h2>

        <div class="flex flex-col md:flex-row md:items-end gap-4">
            <div class="flex-1">
                <x-forms.input-text name="q" label="Mot-clé ou invité" placeholder="Rechercher un titre, un nom…" :value="request('q')" />
            </div>

            <div class="md:w-[260px]">
                <x-forms.select name="duration" label="Durée" :options="$durations" :selected="request('duration')" placeholder="Toutes les durées" />
            </div>

            @if (request()->filled('sort'))
                <input type="hidden" name="sort" value="{{ request('sort') }}" />
            @endif

            <x-forms.submit-button>Rechercher</x-forms.submit-button>
        </div>

        @if (request()->hasAny(['q', 'duration']))
            <a href="{{ route('podcasts.index') }}" class="self-start text-sm underline underline-offset-4 hover:text-sage">Réinitialiser les filtres</a>
        @endif
    </form>
</x-layout.section>
