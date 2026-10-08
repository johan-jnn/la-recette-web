@props([
    'articles',
    'tone' => 'muted',
])

<div {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-3 gap-6']) }}>
    @forelse ($articles as $article)
        <x-articles.card :article="$article" :tone="$tone" />
    @empty
        <x-ui.empty-state message="Aucun article publié pour le moment." />
    @endforelse
</div>
