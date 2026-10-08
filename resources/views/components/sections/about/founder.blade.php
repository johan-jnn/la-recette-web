@props([
    'founder' => null,
])

@php
    // Fondatrice : contenu non administrable pour l'instant (textes du wireframe à remplacer)
    $founder ??= [
        'name' => 'Nom à renseigner',
        'image' => null,
        'paragraphs' => [
            'Présenter ici la personne à l’origine de Maison la recette : son parcours, son lien à la cuisine et l’envie qui a donné naissance au projet.',
            'Ajouter une prise de parole personnelle sur sa façon de mener les rencontres et sur ce qu’elle souhaite transmettre.',
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
