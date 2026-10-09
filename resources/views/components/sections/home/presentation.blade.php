@props([
    'title' => 'Bienvenue dans Maison la recette',
    'image' => asset('images/home/bienvenue.jpg'),
    'paragraphs' => [
        'Nourrir, transmettre, créer des liens, préserver sa santé, protéger la planète : notre alimentation a un impact immense et nous donne à chacun·e le pouvoir d’agir avec sa fourchette.',
        'Notre mission : accélérer la transition alimentaire. Un podcast pour inspirer, un studio pour faire entendre la voix des organisations engagées, et des expériences pour passer à l’action.',
    ],
])

<x-layout.section>
    <x-slot:decor>
        <x-ui.wave variant="white" />
    </x-slot:decor>

    <x-ui.media-text :image="$image" image-alt="Rencontre autour de la cuisine" :title="$title" columns="md:grid-cols-[602px_1fr]">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button :url="route('about')" variant="forest">Notre histoire</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
