@props([
    'founder' => null,
])

@php
    // Fondatrice : contenu non administrable pour l'instant
    $founder ??= [
        'name' => 'Julie Van Ossel',
        'image' => asset('images/about/fondatrice.jpg'),
        'paragraphs' => [
            'Journaliste et entrepreneure sociale, j’ai travaillé pendant 15 ans en télévision et réalisé de nombreux reportages pour Arte, France TV, M6 ou Euronews, principalement sur des sujets liés à l’alimentation. Depuis 2023, je produis et anime le podcast La recette, qui part chaque mois à la rencontre d’artisan·es, chef·fes et producteur·trices qui façonnent l’alimentation de demain.',
            'Productrice et formatrice, je réalise des podcasts autour de l’alimentation et de la gastronomie pour des organismes et des collectivités, et j’enseigne le podcast natif dans des écoles et universités.',
            'Créatrice d’évènements culinaires écoresponsables, je conçois des expériences en partenariat avec des chef·fes, producteur·trices et artisan·es : ateliers de cuisine, food tours, immersions à la ferme.',
        ],
    ];
@endphp

<x-layout.section bg="white">
    <x-ui.media-text
        :image="$founder['image']"
        :image-alt="$founder['name']"
        eyebrow="LA FONDATRICE"
        :title="$founder['name']"
        reverse
        columns="md:grid-cols-[480px_1fr]"
        image-class="h-[430px] rounded-image"
    >
        @foreach ($founder['paragraphs'] as $paragraph)
            <p class="text-muted">{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button :url="route('contact.index')" variant="outline">Entrer en contact</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
