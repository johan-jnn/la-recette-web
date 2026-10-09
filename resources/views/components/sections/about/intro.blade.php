@props([
    'title' => 'Maison la recette',
    'image' => asset('images/studio/evenement.jpg'),
    'paragraphs' => [
        'Un quart de notre empreinte carbone est lié à notre alimentation. En France, 20 tonnes de nourriture sont jetées chaque minute, et un·e Français·e sur trois souffre de maladies chroniques directement liées à son alimentation.',
        'Nourrir, transmettre, créer des liens, préserver sa santé, protéger la planète : notre alimentation a un impact immense et nous donne à chacun·e le pouvoir d’agir avec sa fourchette.',
    ],
])

<x-layout.section bg="white">
    <x-ui.media-text :image="$image" image-alt="L’univers de Maison la recette" :title="$title" image-class="h-[360px] rounded-card">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button :url="route('experiences.index')" variant="forest">Voir les expériences proposées</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
