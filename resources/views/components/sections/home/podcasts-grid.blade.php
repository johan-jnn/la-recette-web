@props([
    'podcasts' => null,
])

@php
    // Récupération dynamique depuis la BDD ou fallback mock si pas encore d'enregistrements (conforme REFERENCE.md)
    if ($podcasts === null) {
        try {
            $podcasts = \App\Models\Podcast::query()->latest()->take(6)->get();
        } catch (\Throwable $e) {
            $podcasts = collect();
        }
    }

    if ($podcasts->isEmpty()) {
        $podcasts = collect([
            (object)[
                'title' => 'Épisode 1 : Aux origines du goût et de la terre',
                'description' => 'Une immersion avec des producteurs passionnés qui réinventent nos assiettes au quotidien.',
                'image' => 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'title' => 'Épisode 2 : L’art de la fermentation artisanale',
                'description' => 'Comprendre les mystères et bienfaits des levains, kéfirs et saveurs oubliées.',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'title' => 'Épisode 3 : Rencontre autour du feu et des braises',
                'description' => 'Techniques ancestrales de cuisson et retour à l’essentiel racontés par nos chefs invités.',
                'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'title' => 'Épisode 4 : Vins vivants et cépages résilients',
                'description' => 'Voyage au cœur des vignes naturelles avec des vignerons artisans du vivant.',
                'image' => 'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'title' => 'Épisode 5 : De la graine à l’assiette étoilée',
                'description' => 'Dialogue inspirant entre maraîchers bio et chefs engagés pour la biodiversité.',
                'image' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?q=80&w=800&auto=format&fit=crop',
            ],
        ]);
    }
@endphp

<section id="podcasts" class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB] overflow-hidden"
    x-data="{
        currentSlide: 0,
        totalItems: {{ count($podcasts) }},
        maxIndex() {
            // Sur mobile (1 item visible), tablette (2 items), desktop (3 items)
            let perPage = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
            return Math.max(0, this.totalItems - perPage);
        },
        next() {
            if (this.currentSlide < this.maxIndex()) {
                this.currentSlide++;
            } else {
                this.currentSlide = 0;
            }
        },
        prev() {
            if (this.currentSlide > 0) {
                this.currentSlide--;
            } else {
                this.currentSlide = this.maxIndex();
            }
        }
    }"
>
    <div class="max-w-6xl mx-auto">
        {{-- En-tête de section avec Titre & Boutons de navigation carrousel --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
            <div>
                <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                    À écouter
                </span>
                <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight">
                    Les derniers épisodes du Podcast
                </h2>
            </div>

            <div class="flex items-center gap-3">
                <x-ui.button :url="'#all-podcasts'" variant="pill">
                    Tous les épisodes ↗
                </x-ui.button>

                {{-- Boutons Flèches Précédent / Suivant Figma (#66:3503 & #66:3491) --}}
                <div class="flex items-center gap-2 ml-2">
                    <button
                        type="button"
                        @click="prev()"
                        class="w-10 h-10 rounded-full border border-[#D6D6D6] bg-white text-[#171717] hover:bg-[#F6F4E4] hover:border-[#1C4937] hover:text-[#1C4937] flex items-center justify-center transition-all cursor-pointer shadow-2xs focus:outline-none"
                        aria-label="Épisode précédent"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button
                        type="button"
                        @click="next()"
                        class="w-10 h-10 rounded-full border border-[#D6D6D6] bg-white text-[#171717] hover:bg-[#F6F4E4] hover:border-[#1C4937] hover:text-[#1C4937] flex items-center justify-center transition-all cursor-pointer shadow-2xs focus:outline-none"
                        aria-label="Épisode suivant"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Conteneur du Carrousel avec translate fluide --}}
        <div class="relative overflow-hidden py-2 -mx-2 px-2">
            <div
                class="flex gap-6 transition-transform duration-500 ease-out"
                :style="'transform: translateX(-' + (currentSlide * (100 / (window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1)))) + '%)'"
            >
                @foreach ($podcasts as $index => $podcast)
                    <div class="w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] shrink-0 bg-white p-6 rounded-2xl border border-[#E5E5E5] flex flex-col justify-between hover:shadow-md transition-shadow group">
                        <div>
                            <div class="w-full h-44 rounded-xl bg-[#E5E5E5] mb-5 overflow-hidden">
                                <img
                                    src="{{ $podcast->image ?? 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=800&auto=format&fit=crop' }}"
                                    alt="{{ $podcast->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                />
                            </div>
                            <h3 class="text-lg font-bold text-[#171717] mb-2 line-clamp-2">
                                {{ $podcast->title }}
                            </h3>
                            <p class="text-sm text-[#626262] line-clamp-3 mb-6 leading-relaxed">
                                {{ $podcast->description }}
                            </p>
                        </div>

                        <div>
                            <a href="#" class="inline-flex items-center text-sm font-semibold text-[#1C4937] hover:underline">
                                Écouter l'épisode ↗
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Indicateurs Dots Figma (Rectangle & Ellipses #66:3492) --}}
        <div class="flex items-center justify-center gap-2 mt-8">
            <template x-for="i in (maxIndex() + 1)" :key="i">
                <button
                    type="button"
                    @click="currentSlide = i - 1"
                    class="transition-all duration-300 rounded-full cursor-pointer h-2"
                    :class="currentSlide === (i - 1) ? 'w-6 bg-[#1C4937]' : 'w-2 bg-[#D6D6D6] hover:bg-[#808080]'"
                    :aria-label="'Aller à la vue ' + i"
                ></button>
            </template>
        </div>
    </div>
</section>
