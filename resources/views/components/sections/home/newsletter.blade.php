@props([
    'action' => '#',
])

<x-layout.section width="3xl" border class="text-center">
    <x-ui.section-heading title="Gardons le lien" description="Recevez les prochains épisodes et les expériences à découvrir." align="center" spacing="mb-0" />
    <span class="text-xs text-[#808080] block mt-2 mb-8">
        Newsletter · rythme d’envoi à préciser.
    </span>

    <form action="{{ $action }}" method="POST" class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 mb-4">
        @csrf
        <input
            type="email"
            name="email"
            placeholder="vous@exemple.fr"
            aria-label="Adresse e-mail"
            required
            class="flex-1 px-4 py-3 rounded-full bg-white border border-[#D6D6D6] text-sm text-[#171717] placeholder:text-[#808080] focus:outline-none focus:ring-2 focus:ring-[#171717]/20 focus:border-[#171717]"
        />

        <x-forms.submit-button variant="dark">
            M’inscrire
        </x-forms.submit-button>
    </form>

    <p class="text-xs text-[#808080] leading-relaxed max-w-lg mx-auto">
        Je souhaite recevoir la newsletter. Désinscription possible à tout moment. Consultez notre politique de confidentialité pour en savoir plus.
    </p>
</x-layout.section>
