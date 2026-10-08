{{-- Barre de recherche d'épisodes de la page podcast --}}
<x-layout.section bg="white">
    <div class="flex flex-col gap-8 text-forest">
        <h2 class="text-subtitle font-bold">Rechercher un épisode</h2>

        <x-forms.podcast-search-form>
            @if (request()->hasAny(['q', 'duration']))
                <a href="{{ route('podcasts.index') }}" class="self-start text-sm underline underline-offset-4 hover:text-sage">Réinitialiser les filtres</a>
            @endif
        </x-forms.podcast-search-form>
    </div>
</x-layout.section>
