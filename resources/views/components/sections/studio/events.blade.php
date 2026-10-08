@props([
    'title' => 'Vos évènements, en public et en podcast',
    'image' => asset('images/studio/evenement.jpg'),
    'paragraphs' => [
        'Conférence, table ronde ou grand entretien : nous concevons, animons et enregistrons un temps d’échange lors de votre évènement autour de l’alimentation et de la gastronomie.',
        'L’enregistrement prolonge la rencontre : il devient un contenu à diffuser auprès de vos publics, bien au-delà de la salle.',
    ],
])

<x-layout.section bg="white">
    <x-ui.media-text :image="$image" image-alt="Grand entretien enregistré sur scène" :title="$title" eyebrow="ÉVÈNEMENT" reverse>
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button url="#contact" variant="rose">Organiser un évènement</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
