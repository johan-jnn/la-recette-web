@props([
    'title' => 'Écouter à votre rythme',
    'description' => 'Retrouvez le podcast sur votre plateforme habituelle.',
])

{{-- Même bandeau que sur l'accueil --}}
<x-sections.home.listen :title="$title" :description="$description" />
