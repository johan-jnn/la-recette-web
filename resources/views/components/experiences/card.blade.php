@props([
    'experience', // App\Models\Experience
])

{{-- Carte expérience : visuel, titre centré, bouton rose --}}
<article {{ $attributes->merge(['class' => 'flex flex-col gap-6']) }}>
    <a href="{{ route('experiences.show', ['id' => $experience->id]) }}" tabindex="-1" aria-hidden="true">
        <x-ui.media :src="$experience->thumbnail_url" :alt="$experience->title" radius="rounded-image" class="h-[220px] w-full" />
    </a>

    <div class="flex flex-col items-center gap-4 text-center">
        <h3 class="text-subtitle font-bold text-forest">{{ $experience->title }}</h3>
        <x-ui.button :url="route('experiences.show', ['id' => $experience->id])" variant="rose">
            Réserver l’expérience
        </x-ui.button>
    </div>
</article>
