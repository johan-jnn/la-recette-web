@props([
    'title' => 'Du micro de podcast à la table d\'hôte',
    'image' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1000&auto=format&fit=crop',
    'paragraphs' => [
        'Au commencement était le son : donner la parole à celles et ceux qui cultivent, élèvent, fermentent et réinventent l’alimentation contemporaine.',
        'Très vite, l’envie d’aller au-delà des mots s’est imposée. De transformer l’écoute en dégustation, la curiosité en expérience physique. C’est ainsi que sont nés nos ateliers immersifs et nos tables partagées.',
    ],
])

<x-layout.section width="5xl">
    <x-ui.media-text :image="$image" image-alt="Atelier et rencontre culinaire" :title="$title">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button :url="route('experiences.index')" variant="primary">
                Découvrir nos expériences ↗
            </x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
