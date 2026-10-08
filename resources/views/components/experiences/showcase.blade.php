@props([
    'experience', // App\Models\Experience
    'theme' => 'forest', // forest, rose, sun
])

@php
    // Déclinaisons de couleur de la maquette (alternées dans la liste)
    $themes = [
        'forest' => ['band' => 'bg-forest text-sage', 'active' => 'bg-forest', 'inactive' => 'bg-cream', 'button' => 'forest', 'imageFirst' => true],
        'rose' => ['band' => 'bg-rose text-forest', 'active' => 'bg-rose', 'inactive' => 'bg-rose/40', 'button' => 'rose', 'imageFirst' => false],
        'sun' => ['band' => 'bg-sun text-forest', 'active' => 'bg-sun', 'inactive' => 'bg-sun/50', 'button' => 'forest-sun', 'imageFirst' => false],
    ];
    $style = $themes[$theme] ?? $themes['forest'];

    // Diaporama : visuel principal puis images du slider (Filament)
    $images = collect([$experience->thumbnail_url])->merge($experience->slider_images_url ?? [])->filter()->values();

    $detailUrl = route('experiences.show', ['id' => $experience->id]);
    $bookingUrl = $experience->luma_event_id ? 'https://lu.ma/event/' . $experience->luma_event_id : $detailUrl;
@endphp

{{-- Bande pleine largeur d'une expérience : diaporama, titre, extrait, pagination et bouton de participation --}}
<article {{ $attributes->merge(['class' => 'relative flex flex-col items-center gap-6']) }} x-data="{ slide: 0, total: {{ $images->count() }} }">
    <div class="relative w-full overflow-hidden {{ $style['band'] }} md:h-[467px] flex flex-col {{ $style['imageFirst'] ? 'md:flex-row' : 'md:flex-row-reverse' }} md:items-center gap-10">
        <a href="{{ $detailUrl }}" class="relative block h-72 md:h-full w-full md:w-[47%] shrink-0 bg-placeholder" tabindex="-1" aria-hidden="true">
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

        <div class="flex flex-1 flex-col items-center justify-center gap-10 px-6 pb-10 md:p-0 text-center">
            <h2 class="text-3xl md:text-quote font-medium max-w-[848px]">
                <a href="{{ $detailUrl }}" class="hover:underline underline-offset-8">{{ $experience->title }}</a>
            </h2>
            <p class="text-body-lg max-w-[564px] line-clamp-3">
                {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($experience->presentation)), 180) }}
            </p>
        </div>
    </div>

    @if ($images->count() > 1)
        <div class="flex items-center justify-center gap-1">
            @foreach ($images as $image)
                <button
                    type="button"
                    @click="slide = {{ $loop->index }}"
                    class="rounded-pill transition-all duration-300 cursor-pointer"
                    :class="slide === {{ $loop->index }} ? 'w-9 h-3 {{ $style['active'] }}' : 'size-3.5 {{ $style['inactive'] }}'"
                    aria-label="Afficher la photo {{ $loop->iteration }}"
                ></button>
            @endforeach
        </div>
    @endif

    <x-ui.button :url="$bookingUrl" :variant="$style['button']" :external="(bool) $experience->luma_event_id">
        Participer à l’évènement
    </x-ui.button>
</article>
