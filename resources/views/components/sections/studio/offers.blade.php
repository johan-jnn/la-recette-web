@props([
    'offers' => null,
])

@php
    // Offres du studio non administrables pour l'instant
    $offers ??= [
        [
            'pitch' => 'Faites entendre votre voix',
            'text' => 'Associez votre marque à un podcast écouté par une communauté engagée pour une alimentation durable : 4,9/5 sur les plateformes d’écoute et plus de 50 000 écoutes.',
            'title' => 'Sponsoring',
            'description' => 'Message personnalisé diffusé en pré-roll ou épisode partenaire en lien avec la ligne éditoriale du podcast.',
        ],
        [
            'pitch' => 'De l’idée à la diffusion',
            'text' => 'Journaliste pendant 15 ans pour Arte, France TV, M6 ou Euronews, Julie Van Ossel met son expertise éditoriale et audio au service de votre projet.',
            'title' => 'Studio de production',
            'description' => 'Production de podcasts audio et vidéo : conception éditoriale, enregistrement, montage, diffusion et communication.',
        ],
        [
            'pitch' => 'Vos évènements, en public et en podcast',
            'text' => 'Conférence, table ronde ou grand entretien : un temps d’échange qui devient un contenu à diffuser auprès de vos publics.',
            'title' => 'Évènement',
            'description' => 'Création, animation et enregistrement d’une conférence ou d’une table ronde lors d’un de vos évènements autour de l’alimentation et de la gastronomie.',
        ],
    ];
@endphp

{{-- Offres du studio en zigzag : argumentaire d'un côté, carte numérotée de l'autre --}}
<x-layout.section id="offres" bg="white" padding="py-16 md:py-[72px]">
    <x-slot:decor>
        <x-ui.wave variant="white" edge="below" />
    </x-slot:decor>

    <h2 class="sr-only">Nos offres</h2>

    <div class="flex flex-col gap-12 md:gap-[52px]">
        @foreach ($offers as $offer)
            @php($cardFirst = $loop->even)

            <div data-reveal class="grid grid-cols-1 items-center gap-8 md:gap-[35px] md:px-[45px] md:py-[30px] md:grid-cols-2 {{ $cardFirst ? 'lg:grid-cols-[665px_1fr]' : 'lg:grid-cols-[1fr_665px]' }}">
                <div class="flex flex-col items-start gap-5 text-forest {{ $cardFirst ? 'md:order-2' : '' }}">
                    <h3 class="text-3xl md:text-quote font-medium">{{ $offer['pitch'] }}</h3>
                    <p class="text-base leading-[1.55]">{{ $offer['text'] }}</p>
                    <x-ui.button url="#contact" variant="forest">Ça m’intéresse</x-ui.button>
                </div>

                <x-ui.numbered-card
                    :number="$loop->iteration"
                    :title="$offer['title']"
                    :description="$offer['description']"
                    :link="['label' => 'En savoir plus', 'url' => route('contact.index', ['type' => 'devis'])]"
                    :tone="$cardFirst ? 'rose' : 'forest'"
                    class="md:min-h-[284px]"
                />
            </div>
        @endforeach
    </div>
</x-layout.section>
