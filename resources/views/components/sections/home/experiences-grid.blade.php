@props([
    'experiences' => null,
])

@php
    if ($experiences === null) {
        try {
            $experiences = \App\Models\Experience::query()->latest()->take(3)->get();
        } catch (\Throwable $e) {
            $experiences = collect();
        }
    }

    if ($experiences->isEmpty()) {
        $experiences = collect([
            (object)[
                'title' => 'Table Partagée : Dîner immersif de saison',
                'presentation' => 'Un repas en 5 temps orchestré par nos chefs en résidence autour de produits sourcés.',
            ],
            (object)[
                'title' => 'Atelier Pratique : Maîtriser le levain et le pain maison',
                'presentation' => 'Apprenez les gestes, la fermentation et repartez avec votre propre pâton à cuire.',
            ],
            (object)[
                'title' => 'Masterclass Sensorielle : Les secrets des accords mets & breuvages',
                'presentation' => 'Une dégustation guidée pour affiner son palais et décrypter les harmonies d’arômes.',
            ],
        ]);
    }
@endphp

<section id="experiences" class="w-full py-20 px-6 md:px-16 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
            <div>
                <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                    À vivre
                </span>
                <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight">
                    Nos Expériences à partager
                </h2>
            </div>

            <x-ui.button :url="route('experiences.index')" variant="pill">
                Toutes les expériences ↗
            </x-ui.button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($experiences as $experience)
                <div class="bg-[#F9F9FB] rounded-2xl border border-[#E5E5E5] overflow-hidden flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="w-full h-48 bg-[#E5E5E5] overflow-hidden">
                            <img
                                src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop"
                                alt="{{ $experience->title }}"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-[#171717] mb-2 line-clamp-2">
                                {{ $experience->title }}
                            </h3>
                            <p class="text-sm text-[#626262] line-clamp-3 leading-relaxed">
                                {!! strip_tags($experience->presentation) !!}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="{{ route('experiences.index') }}" class="inline-flex items-center text-sm font-semibold text-[#171717] hover:underline">
                            Découvrir l'expérience ↗
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
