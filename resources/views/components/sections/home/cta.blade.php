@props([
    'quote' => 'Des histoires à écouter, des moments à partager.',
    'label' => 'Découvrir les actualités',
    'url' => null,
])

{{-- Bandeau d'appel à l'action vert foncé, fourchette décorative en bas à gauche --}}
<x-layout.section>
    <x-slot:decor>
        <x-ui.decor name="fork" width="358" height="490" class="left-[2.71%] top-[41.41%] w-[358px] h-[490px] hidden md:block" />
    </x-slot:decor>

    <div class="relative mx-auto flex max-w-[1140px] flex-col items-center gap-10 rounded-card bg-forest px-6 py-16 md:px-[146px] md:py-20 text-center text-white">
        <p class="text-3xl md:text-quote font-medium max-w-[848px]">{{ $quote }}</p>
        <x-ui.button :url="$url ?? route('articles.index') . '#articles'" variant="neutral">{{ $label }}</x-ui.button>
    </div>
</x-layout.section>
