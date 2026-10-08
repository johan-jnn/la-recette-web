@props([
    'title' => 'Se rencontrer autour de la cuisine',
    'description' => 'Ateliers, rencontres et tables partagées : découvrez des moments à vivre pour goûter, apprendre et échanger.',
])

{{-- En-tête de la page expériences : carte vert foncé et légumes décoratifs --}}
<x-layout.section padding="py-16 md:py-[142px]">
    <x-ui.quote-card :quote="$title" :description="$description" tag="h1">
        <x-slot:decor>
            <x-ui.decor name="veggies" width="420" height="361" class="left-[69.8%] top-[33.6%] w-[419.74px] h-[360.55px] hidden lg:block" />
        </x-slot:decor>

        <x-ui.button url="#contact" variant="cream">Nous contacter</x-ui.button>
        <x-ui.button url="#experiences" variant="rose">Découvrir les expériences</x-ui.button>
    </x-ui.quote-card>
</x-layout.section>
