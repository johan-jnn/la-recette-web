@props([
    'quote' => 'Inspirer, sensibiliser, donner le pouvoir d’agir.',
    'label' => 'Découvrir les actualités',
    'url' => null,
])

{{-- Bandeau d'appel à l'action vert foncé, fourchette décorative en bas à gauche --}}
<x-layout.section>
    <x-slot:decor>
        <x-ui.decor name="fork" width="358" height="490" class="left-[2.71%] top-[41.41%] w-[358px] h-[490px] hidden md:block" />
    </x-slot:decor>

    <x-ui.quote-card :quote="$quote">
        <x-ui.button :url="$url ?? route('articles.index')" variant="neutral">{{ $label }}</x-ui.button>
    </x-ui.quote-card>
</x-layout.section>
