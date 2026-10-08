@props([
    'selectedExperiences' => [],
    'selectedType' => null,
])

{{-- Demande générale : orientation à gauche, formulaire à droite (wireframe "Contact") --}}
<x-layout.section bg="white" id="contact">
    <div class="grid grid-cols-1 lg:grid-cols-[430px_1fr] gap-8 lg:gap-12 items-start">
        <div class="flex flex-col gap-5 text-forest">
            <h2 class="text-title font-bold">Une demande générale</h2>
            <p class="text-body-lg">
                Utilisez ce formulaire pour poser une question sur le podcast, une expérience ou le projet.
            </p>
        </div>

        <x-forms.contact-form :selected-experiences="$selectedExperiences" :selected-type="$selectedType" />
    </div>
</x-layout.section>
