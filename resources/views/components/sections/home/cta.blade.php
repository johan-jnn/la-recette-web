@props([
    'quote' => 'Inspirer, sensibiliser, donner le pouvoir d’agir.',
    'label' => 'Nous contacter',
    'url' => null,
    'bg' => 'cream', // fond de la section : cream, white
    'tone' => 'forest', // fond de la carte : forest, sage
    'forkSide' => 'left', // position de la fourchette : left, right
    'padding' => 'py-16 md:py-[72px]',
])

{{-- Bandeau d'appel à l'action : carte citation et fourchette décorative posée devant la carte --}}
<x-layout.section :bg="$bg" :padding="$padding" class="overflow-hidden">
    <x-slot:decor>
        <x-ui.decor name="fork" width="358" height="490" :color="$tone === 'sage' ? 'forest' : null" class="{{ $forkSide === 'right' ? 'right-0 top-[290px]' : 'left-[2.71%] top-[212px]' }} z-10 w-[358px] h-[490px] hidden md:block" />
    </x-slot:decor>

    <x-ui.quote-card :quote="$quote" :tone="$tone">
        <x-ui.button :url="$url ?? route('contact.index')" variant="cream">{{ $label }}</x-ui.button>
    </x-ui.quote-card>
</x-layout.section>
