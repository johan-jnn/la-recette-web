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

            <div class="mt-3 flex flex-col items-start gap-5 rounded-card bg-cream p-7">
                <h3 class="text-subtitle font-bold">Un projet d’entreprise ?</h3>
                <p class="text-body-lg">Parlez-nous de votre équipe et du moment que vous souhaitez imaginer.</p>
                <x-ui.button :url="route('contact.index', ['type' => \App\Enums\ContactType::DEVIS->value]) . '#contact'" variant="outline">
                    Formulaire entreprises
                </x-ui.button>
            </div>
        </div>

        <x-forms.contact-form :selected-experiences="$selectedExperiences" :selected-type="$selectedType" />
    </div>
</x-layout.section>
