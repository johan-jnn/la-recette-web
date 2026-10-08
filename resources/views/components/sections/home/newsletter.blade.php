@props([
    'action' => '#',
])

<section class="w-full py-20 px-6 md:px-16 bg-white border-t border-[#E5E5E5]">
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight mb-3">
            Gardons le lien
        </h2>
        <p class="text-base text-[#626262] mb-2">
            Recevez les prochains épisodes et les expériences à découvrir.
        </p>
        <span class="text-xs text-[#808080] block mb-8">
            Newsletter · rythme d’envoi à préciser.
        </span>

        <form action="{{ $action }}" method="POST" class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 mb-4">
            @csrf
            <input
                type="email"
                name="email"
                placeholder="vous@exemple.fr"
                required
                class="flex-1 px-4 py-3 rounded-full bg-white border border-[#D6D6D6] text-sm text-[#171717] placeholder:text-[#808080] focus:outline-none focus:ring-2 focus:ring-[#171717]/20 focus:border-[#171717]"
            />

            <button
                type="submit"
                class="px-6 py-3 rounded-full bg-[#171717] text-white text-sm font-semibold hover:bg-black transition-colors cursor-pointer"
            >
                M’inscrire
            </button>
        </form>

        <p class="text-xs text-[#808080] leading-relaxed max-w-lg mx-auto">
            Je souhaite recevoir la newsletter. Désinscription possible à tout moment. Consultez notre politique de confidentialité pour en savoir plus.
        </p>
    </div>
</section>
