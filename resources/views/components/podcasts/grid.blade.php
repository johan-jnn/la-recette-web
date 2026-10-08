@props([
    'podcasts',
])

<div {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6']) }}>
    @forelse ($podcasts as $podcast)
        <x-podcasts.card :podcast="$podcast" />
    @empty
        <x-ui.empty-state message="Les premiers épisodes arrivent très bientôt." />
    @endforelse
</div>
