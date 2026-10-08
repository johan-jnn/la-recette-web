@props([
    'title',
    'description' => null,
    'breadcrumb' => [], // éléments après "Accueil"
])

{{-- En-tête des pages internes (wireframes) : fil d'Ariane, titre et chapeau --}}
<x-layout.section padding="pt-12 pb-16 md:pt-[72px] md:pb-[72px]">
    <div class="flex flex-col gap-8 text-forest">
        <x-ui.breadcrumb :items="[['label' => 'Accueil', 'url' => route('home')], ...$breadcrumb]" />

        <h1 class="text-4xl md:text-[3.25rem] font-bold leading-[1.15]">{{ $title }}</h1>

        @if ($description)
            <p class="text-body-lg max-w-4xl">{{ $description }}</p>
        @endif

        {{ $slot }}
    </div>
</x-layout.section>
