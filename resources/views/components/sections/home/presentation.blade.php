@props([
    'title' => 'Bienvenue dans Maison la recette',
    'image' => asset('images/home/bienvenue.jpg'),
    'paragraphs' => [
        'Écouter un parcours, découvrir un savoir-faire, cuisiner ensemble : la recette commence par une rencontre.',
        'Maison la recette relie des récits culinaires à des moments vécus, pour les curieux comme pour les équipes.',
    ],
])

<x-layout.section>
    <x-slot:decor>
        <x-ui.decor name="citrus" width="474" height="447" class="left-3/4 top-1/2 w-[474px] h-[447px] hidden md:block" />
        <x-ui.wave variant="white" class="bottom-0 z-10" />
    </x-slot:decor>

    <x-ui.media-text :image="$image" image-alt="Rencontre autour de la cuisine" :title="$title" columns="md:grid-cols-[602px_1fr]">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach

        <x-slot:actions>
            <x-ui.button :url="route('about')">Notre histoire</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
