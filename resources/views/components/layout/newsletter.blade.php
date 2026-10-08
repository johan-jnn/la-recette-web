@props([
    'action' => '#',
])

{{-- Inscription newsletter (haut du pied de page dans la maquette) --}}
<div {{ $attributes->merge(['class' => 'grid grid-cols-1 lg:grid-cols-[1fr_600px] gap-8 text-white']) }}>
    <div class="flex flex-col gap-5">
        <h2 class="text-title font-bold">Gardons le lien</h2>
        <p class="text-body-lg">Recevez chaque mois le nouvel épisode du podcast et les prochaines expériences.</p>
        <p class="text-sm leading-[1.55]">Une newsletter par mois, au rythme du podcast.</p>
    </div>

    <form action="{{ $action }}" method="POST" class="flex flex-col gap-5">
        @csrf

        <div class="flex flex-col sm:flex-row sm:items-end gap-3">
            <div class="flex flex-1 flex-col gap-2">
                <label for="newsletter_email" class="text-base font-semibold">Votre adresse e-mail</label>
                <input
                    type="email"
                    id="newsletter_email"
                    name="email"
                    placeholder="vous@exemple.fr"
                    required
                    class="h-[52px] w-full rounded-full border border-line bg-white px-4 text-base text-ink placeholder:text-muted focus:outline-none focus:ring-2 focus:ring-sage"
                />
            </div>

            <x-forms.submit-button>M’inscrire</x-forms.submit-button>
        </div>

        <label class="flex items-start gap-3 text-sm leading-normal cursor-pointer">
            <input type="checkbox" name="newsletter_consent" value="1" required class="mt-0.5 size-5 shrink-0 accent-sage cursor-pointer" />
            <span>Je souhaite recevoir la newsletter. Désinscription possible à tout moment.</span>
        </label>

        <p class="text-sm leading-[1.55]">
            Consultez la Politique de confidentialité pour connaître le traitement de vos données.
        </p>
    </form>
</div>
