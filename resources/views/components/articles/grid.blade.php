@props([
    'articles',
    'buttonVariant' => 'sun', // transmis à la carte article
    'buttonIcon' => false,
])

<div data-reveal-stagger {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-3 gap-8']) }}>
    @forelse ($articles as $article)
        <x-articles.card :article="$article" :button-variant="$buttonVariant" :button-icon="$buttonIcon" />
    @empty
        <x-ui.empty-state message="Aucun article publié pour le moment." />
    @endforelse
</div>
