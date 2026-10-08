@extends('layouts.page')

@section('title', 'Maison La Recette — Toutes les expériences')
@section('description', 'Réservez des ateliers pratiques, dégustations sensorielles et tables partagées.')

@php
    try {
        $experiences = \App\Models\Experience::query()->latest()->get();
    } catch (\Throwable $e) {
        $experiences = collect();
    }

    if ($experiences->isEmpty()) {
        $experiences = collect([
            (object)[
                'id' => 1,
                'title' => 'Table Partagée : Dîner immersif de saison',
                'presentation' => 'Un repas en 5 temps orchestré par nos chefs en résidence autour de produits sourcés et de cuissons maîtrisées.',
                'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'id' => 2,
                'title' => 'Atelier Pratique : Maîtriser le levain et le pain maison',
                'presentation' => 'Apprenez les gestes ancestraux, la fermentation lente et repartez avec votre propre pâton à cuire.',
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'id' => 3,
                'title' => 'Masterclass Sensorielle : Les secrets des accords mets & breuvages',
                'presentation' => 'Une dégustation guidée pour affiner son palais et décrypter les harmonies d’arômes et de terroirs.',
                'image' => 'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=800&auto=format&fit=crop',
            ],
            (object)[
                'id' => 4,
                'title' => 'Rencontre autour du feu : Cuissons primitives et herbes sauvages',
                'presentation' => 'Une journée en extérieur pour apprivoiser la braise, fumer les aliments et cueillir les herbes comestibles.',
                'image' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop',
            ],
        ]);
    }
@endphp

@push('main')
    <div class="w-full bg-[#171717] text-white pt-32 pb-16 px-6 md:px-16 text-center">
        <div class="max-w-4xl mx-auto">
            <span class="text-xs uppercase tracking-widest font-semibold text-[#C8C8C8] block mb-3">
                Nos Formats
            </span>
            <h1 class="text-4xl md:text-5xl font-semibold tracking-tight mb-4">
                Toutes les expériences
            </h1>
            <p class="text-base md:text-lg text-[#C8C8C8] max-w-xl mx-auto">
                Participez à des moments conviviaux pensés pour goûter, apprendre et échanger autour du goût.
            </p>
        </div>
    </div>

    <section class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB]">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($experiences as $experience)
                    <div class="bg-white rounded-3xl border border-[#E5E5E5] overflow-hidden flex flex-col justify-between hover:shadow-md transition-shadow group">
                        <div>
                            <div class="w-full h-52 bg-[#E5E5E5] overflow-hidden">
                                <img
                                    src="{{ $experience->thumbnail_url ?? ($experience->image ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop') }}"
                                    alt="{{ $experience->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                />
                            </div>
                            <div class="p-6">
                                <h2 class="text-xl font-bold text-[#171717] mb-2 line-clamp-2">
                                    {{ $experience->title }}
                                </h2>
                                <p class="text-sm text-[#626262] line-clamp-3 leading-relaxed">
                                    {!! strip_tags($experience->presentation) !!}
                                </p>
                            </div>
                        </div>

                        <div class="p-6 pt-0">
                            <a
                                href="{{ route('experiences.show', ['id' => $experience->id ?? 1]) }}"
                                class="inline-flex items-center text-sm font-semibold text-[#1C4937] hover:underline"
                            >
                                Voir la fiche expérience ↗
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-sections.home.faq />
    <x-sections.home.newsletter />
@endpush
