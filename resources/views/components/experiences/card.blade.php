@props([
    'experience', // App\Models\Experience
    'tone' => 'white',
])

<x-ui.media-card
    :image="$experience->thumbnail_url"
    :title="$experience->title"
    :description="html_entity_decode(strip_tags($experience->presentation))"
    :tone="$tone"
    {{ $attributes }}
>
    <x-slot:footer>
        <x-ui.text-link :url="route('experiences.show', ['id' => $experience->id])">
            Découvrir l'expérience ↗
        </x-ui.text-link>
    </x-slot:footer>
</x-ui.media-card>
