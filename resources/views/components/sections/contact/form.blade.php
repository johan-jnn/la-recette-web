@props([
    'selectedExperiences' => [],
    'selectedType' => null,
])

{{-- Demande générale : orientation à gauche, formulaire à droite (wireframe "Contact") --}}
<x-layout.section bg="white" id="contact">
    <div data-reveal-stagger class="grid grid-cols-1 lg:grid-cols-[430px_1fr] gap-8 lg:gap-12 items-start">
        <div class="flex flex-col gap-5 text-forest">
            <h2 class="text-title font-bold">Une demande générale</h2>
            <p class="text-body-lg">
                Utilisez ce formulaire pour une question sur le podcast, une demande de devis pour le studio ou une expérience, ou une réservation.
            </p>
        </div>

        <x-forms.contact-form :selected-experiences="$selectedExperiences" :selected-type="$selectedType" />
    </div>
</x-layout.section>
