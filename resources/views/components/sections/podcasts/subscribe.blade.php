@props([
    'title' => 'Abonnez-vous pour ne rien rater',
    'description' => 'Retrouvez Maison La Recette sur votre plateforme d\'écoute préférée.',
])

<x-layout.section bg="brand" width="2xl" padding="py-16" class="text-center">
    <h2 class="text-2xl md:text-3xl font-semibold tracking-tight mb-3">{{ $title }}</h2>
    <p class="text-sm text-white/75 mb-8">{{ $description }}</p>
    <x-podcasts.platform-links />
</x-layout.section>
