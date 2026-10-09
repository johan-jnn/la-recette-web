@props([
    'experience', // App\Models\Experience
    'theme' => 'forest', // forest, rose, sun
])

@php
    // Déclinaisons de couleur de la maquette (alternées dans la liste)
    $themes = [
        'forest' => ['band' => 'bg-forest', 'card' => 'bg-sage text-white', 'active' => 'bg-cream', 'inactive' => 'bg-cream', 'button' => 'forest', 'imageFirst' => true],
        'rose' => ['band' => 'bg-rose', 'card' => 'bg-rose-light text-forest', 'active' => 'bg-cream', 'inactive' => 'bg-cream', 'button' => 'cream', 'imageFirst' => false],
        'sun' => ['band' => 'bg-sun', 'card' => 'bg-cream text-forest', 'active' => 'bg-sun', 'inactive' => 'bg-sun/40', 'button' => 'sun', 'imageFirst' => true],
    ];
    $style = $themes[$theme] ?? $themes['forest'];

    // Diaporama : visuel principal puis images du slider (Filament)
    $images = collect([$experience->thumbnail_url])->merge($experience->slider_images_url ?? [])->filter()->values();

    $detailUrl = route('experiences.show', ['id' => $experience->id]);
    $bookingUrl = $experience->luma_event_id ? 'https://lu.ma/event/' . $experience->luma_event_id : $detailUrl;
@endphp

{{-- Bande pleine largeur d'une expérience : diaporama et carte de texte (titre, extrait, bouton, pagination) --}}
<article
    data-reveal
    {{ $attributes->merge(['class' => "w-full {$style['band']} px-6 py-6 md:px-[60px] md:py-7"]) }}
    x-data="{ slide: 0, total: {{ $images->count() }} }"
>
    <div class="flex flex-col gap-6 md:gap-10 md:items-center {{ $style['imageFirst'] ? 'md:flex-row' : 'md:flex-row-reverse' }}">
        <a href="{{ $detailUrl }}" class="relative block h-64 md:h-[391px] w-full md:w-[570px] shrink-0 overflow-hidden rounded-card bg-placeholder" tabindex="-1" aria-hidden="true">
            @foreach ($images as $image)
                <x-ui.image
                    :src="$image"
                    :alt="$experience->title"
                    :lazy="!$loop->first"
                    class="absolute inset-0 transition-opacity duration-500"
                    x-bind:class="slide === {{ $loop->index }} ? 'opacity-100' : 'opacity-0'"
                />
            @endforeach
        </a>

        <div class="flex flex-1 flex-col items-start justify-center gap-6 self-stretch rounded-panel p-6 md:min-h-[410px] md:p-[30px] {{ $style['card'] }}">
            <h2 class="text-3xl md:text-quote font-medium">
                <a href="{{ $detailUrl }}" class="hover:underline underline-offset-8">{{ $experience->title }}</a>
            </h2>

            <p class="text-body-lg line-clamp-3">
                {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($experience->presentation)), 180) }}
            </p>

            <x-ui.button :url="$bookingUrl" :variant="$style['button']" :external="(bool) $experience->luma_event_id">
                Participer à l’évènement
            </x-ui.button>

            @if ($images->count() > 1)
                <div class="flex items-center justify-center gap-1 self-center">
                    @foreach ($images as $image)
                        <button
                            type="button"
                            @click="slide = {{ $loop->index }}"
                            class="rounded-pill transition-all duration-300 cursor-pointer"
                            :class="slide === {{ $loop->index }} ? 'w-9 h-3 {{ $style['active'] }}' : 'size-3 {{ $style['inactive'] }}'"
                            aria-label="Afficher la photo {{ $loop->iteration }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</article>
