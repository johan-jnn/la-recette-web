@props([
    'title' => 'Un écosystème culinaire engagé',
    'subtitle' => 'LA MAISON LA RECETTE',
    'paragraphs' => [
        'Maison La Recette rassemble passionnés, artisans et créateurs autour d’une même table pour raconter et savourer l’essence de la gastronomie contemporaine.',
        'À travers notre studio de production, nos séries de podcasts intimistes et des formats d’événements sur-mesure, nous créons des passerelles vivantes entre le champ, le fourneau et la dégustation.',
    ],
])

<section class="w-full py-20 px-6 md:px-16 bg-white border-t border-[#E5E5E5]">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row gap-12 items-center">
        <div class="w-full md:w-1/2">
            <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-3">
                {{ $subtitle }}
            </span>
            <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight mb-6 leading-snug">
                {{ $title }}
            </h2>

            <div class="space-y-4 text-base text-[#626262] leading-relaxed">
                @foreach ($paragraphs as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="mt-8">
                <x-ui.button :url="route('about')" variant="primary">
                    Découvrir notre histoire ↗
                </x-ui.button>
            </div>
        </div>

        <div class="w-full md:w-1/2">
            <div class="rounded-3xl overflow-hidden shadow-sm aspect-4/3 bg-[#E5E5E5]">
                <img
                    src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1000&auto=format&fit=crop"
                    alt="Atelier culinaire Maison La Recette"
                    class="w-full h-full object-cover"
                />
            </div>
        </div>
    </div>
</section>
