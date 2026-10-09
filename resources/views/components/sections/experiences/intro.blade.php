@props([
    'title' => 'Des expériences inspirantes et apprenantes',
    'description' => 'Ateliers, food tours et immersions co-construits avec des chef·fes, artisan·es et producteur·trices engagé·es, pour découvrir, cuisiner et apprendre ensemble.',
])

{{-- En-tête de la page expériences : carte vert foncé et légumes décoratifs --}}
<x-sections.shared.hero-card :title="$title" :description="$description" bg="cream" padding="py-16 md:pt-[140px] md:pb-[142px]">
    <x-slot:decor>
        <x-ui.decor name="veggies" width="420" height="361" class="left-[69.8%] top-[33.6%] w-[419.74px] h-[360.55px] hidden lg:block" />
    </x-slot:decor>

    <x-ui.button url="#contact" variant="cream">Nous contacter</x-ui.button>
    <x-ui.button url="#experiences" variant="sage">Rejoindre une expérience</x-ui.button>
</x-sections.shared.hero-card>
