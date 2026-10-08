@props([
    'title' => 'De l’idée à la diffusion',
    'image' => asset('images/studio/production.jpg'),
    'paragraphs' => [
        'La recette met son expertise en création éditoriale et en réalisation audio et vidéo au service des acteur·ices de l’alimentation durable : entreprises, organisations et collectivités.',
        'Journaliste pendant 15 ans pour Arte, France TV, M6 ou Euronews, et formatrice au podcast natif dans des écoles et universités, Julie Van Ossel vous accompagne à chaque étape : conception éditoriale, enregistrement, montage, diffusion et communication.',
    ],
])

<x-layout.section>
    <x-ui.media-text :image="$image" image-alt="Matériel d’enregistrement du studio La recette" :title="$title" eyebrow="STUDIO DE PRODUCTION">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button url="#contact">Demander un devis</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
