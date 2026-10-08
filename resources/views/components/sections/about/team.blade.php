@props([
    'title' => 'L’équipe & les collaborations',
    'description' => 'Les personnes qui contribuent au podcast et aux expériences.',
    'members' => null,
])

@php
    // Équipe non administrable pour l'instant (textes du wireframe à remplacer)
    $members ??= [
        ['role' => 'Éditorial & production', 'bio' => 'Nom, rôle et courte présentation à renseigner.', 'image' => null],
        ['role' => 'Expériences & coordination', 'bio' => 'Nom, rôle et courte présentation à renseigner.', 'image' => null],
        ['role' => 'Intervenants & savoir-faire', 'bio' => 'Nom, rôle et courte présentation à renseigner.', 'image' => null],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading :title="$title" :description="$description" />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($members as $member)
            <x-ui.profile-card :image="$member['image']" :title="$member['role']" :description="$member['bio']" />
        @endforeach
    </div>
</x-layout.section>
