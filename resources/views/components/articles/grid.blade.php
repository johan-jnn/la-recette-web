@props([
    'articles',
])

<div data-reveal-stagger {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-3 gap-8']) }}>
    @forelse ($articles as $article)
        <x-articles.card :article="$article" />
    @empty
        <x-ui.empty-state message="Aucun article publié pour le moment." />
    @endforelse
</div>
