@props([
    'title' => 'Maison la recette',
    'image' => asset('images/home/bienvenue.jpg'),
    'paragraphs' => [
        'Un espace pour écouter les parcours de celles et ceux qui font la cuisine et pour prolonger ces rencontres autour de la table.',
        'Le podcast donne la parole. Les expériences invitent à découvrir, à faire ensemble et à partager. Deux façons d’ouvrir la conversation autour de ce qui nous nourrit.',
    ],
])

<x-layout.section bg="white">
    <x-ui.media-text :image="$image" image-alt="L’univers de Maison la recette" :title="$title" image-class="h-[360px] rounded-image">
        @foreach ($paragraphs as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </x-ui.media-text>
</x-layout.section>
