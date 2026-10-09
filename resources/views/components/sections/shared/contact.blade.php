@props([
    'title' => 'Contactez-nous',
    'description' => 'Teambuilding, séminaire, afterwork ou déjeuner d’équipe ? Dans vos locaux, chez nos partenaires ou à la ferme, de 2 h à une journée complète : demandez votre devis sur mesure.',
    'selectedType' => null, // App\Enums\ContactType pré-sélectionné
    'selectedExperiences' => [],
    'waveTop' => false, // bord déchiré au-dessus de la section
    'waveBottom' => false, // bord déchiré sous la section
])

{{-- Bloc contact vert foncé : flèche décorative, titre et formulaire dans une carte verte --}}
<section id="contact" class="relative w-full bg-forest px-4 pt-16 pb-16 md:pt-[111px] md:pb-[100px] scroll-mt-24">
    @if ($waveTop)
        <x-ui.wave variant="forest" edge="above" />
    @endif

    <x-ui.decor name="arrow-curve" width="458" height="299" color="sage" class="left-[-142px] top-[-138px] w-[458px] h-[299px] hidden md:block" />

    <div data-reveal class="relative mx-auto flex max-w-[1120px] flex-col items-center gap-[50px]">
        <div class="flex flex-col items-center gap-5 text-center">
            <h2 class="text-3xl md:text-quote font-medium text-cream">{{ $title }}</h2>
            <p class="text-base leading-6 text-white max-w-[680px]">{{ $description }}</p>
        </div>

        <div class="w-full rounded-card bg-sage p-6 md:p-[50px]">
            <x-forms.contact-form theme="dark" :selected-type="$selectedType" :selected-experiences="$selectedExperiences" />
        </div>
    </div>

    @if ($waveBottom)
        <x-ui.wave variant="forest" edge="below" />
    @endif
</section>
