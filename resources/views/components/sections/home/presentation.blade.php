@props([
    'title' => 'Un écosystème culinaire engagé',
    'eyebrow' => 'La Maison La Recette',
    'image' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1000&auto=format&fit=crop',
    'paragraphs' => [
        'Maison La Recette rassemble passionnés, artisans et créateurs autour d’une même table pour raconter et savourer l’essence de la gastronomie contemporaine.',
        'À travers notre studio de production, nos séries de podcasts intimistes et des formats d’événements sur-mesure, nous créons des passerelles vivantes entre le champ, le fourneau et la dégustation.',
    ],
])

<x-layout.section width="5xl" border>
    <x-ui.media-text :image="$image" image-alt="Atelier culinaire Maison La Recette" :eyebrow="$eyebrow" :title="$title">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button :url="route('about')" variant="primary">
                Découvrir notre histoire ↗
            </x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
