@props([
    'experiences',
])

<div data-reveal-stagger {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6']) }}>
    @forelse ($experiences as $experience)
        <x-experiences.card :experience="$experience" />
    @empty
        <x-ui.empty-state message="De nouvelles expériences seront bientôt annoncées." />
    @endforelse
</div>
