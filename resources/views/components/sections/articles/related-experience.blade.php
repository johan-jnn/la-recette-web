@props([
    'experience' => null, // App\Models\Experience associée à l'article
])

{{-- Expérience associée à l'article (Article::experience) --}}
@if ($experience)
    <x-layout.section>
        <x-ui.section-heading eyebrow="Pour aller plus loin" title="L’expérience associée">
            <x-ui.button :url="route('experiences.index')" variant="outline">Toutes les expériences</x-ui.button>
        </x-ui.section-heading>

        <x-experiences.grid :experiences="collect([$experience])" />
    </x-layout.section>
@endif
