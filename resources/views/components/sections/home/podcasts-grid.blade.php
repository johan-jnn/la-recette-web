@props([
    'podcasts' => null,
])

@php
    // Récupération dynamique depuis la BDD ou fallback mock si pas encore d'enregistrements (conforme REFERENCE.md)
    if ($podcasts === null) {
        try {
            $podcasts = \App\Models\Podcast::query()->latest()->take(3)->get();
        } catch (\Throwable $e) {
            $podcasts = collect();
        }
    }

    if ($podcasts->isEmpty()) {
        $podcasts = collect([
            (object)[
                'title' => 'Épisode 1 : Aux origines du goût et de la terre',
                'description' => 'Une immersion avec des producteurs passionnés qui réinventent nos assiettes au quotidien.',
            ],
            (object)[
                'title' => 'Épisode 2 : L’art de la fermentation artisanale',
                'description' => 'Comprendre les mystères et bienfaits des levains, kéfirs et saveurs oubliées.',
            ],
            (object)[
                'title' => 'Épisode 3 : Rencontre autour du feu et des braises',
                'description' => 'Techniques ancestrales de cuisson et retour à l’essentiel racontés par nos chefs invités.',
            ],
        ]);
    }
@endphp

<section id="podcasts" class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB]">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
            <div>
                <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                    À écouter
                </span>
                <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight">
                    Les derniers épisodes du Podcast
                </h2>
            </div>

            <x-ui.button :url="'#all-podcasts'" variant="pill">
                Tous les épisodes ↗
            </x-ui.button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($podcasts as $podcast)
                <div class="bg-white p-6 rounded-2xl border border-[#E5E5E5] flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="w-full h-44 rounded-xl bg-[#E5E5E5] mb-5 overflow-hidden">
                            <img
                                src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=800&auto=format&fit=crop"
                                alt="{{ $podcast->title }}"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <h3 class="text-lg font-bold text-[#171717] mb-2 line-clamp-2">
                            {{ $podcast->title }}
                        </h3>
                        <p class="text-sm text-[#626262] line-clamp-3 mb-6 leading-relaxed">
                            {{ $podcast->description }}
                        </p>
                    </div>

                    <a href="#" class="inline-flex items-center text-sm font-semibold text-[#171717] hover:underline">
                        Écouter l'épisode ↗
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
