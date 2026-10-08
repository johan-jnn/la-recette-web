@extends('layouts.page')

@section('title', 'Maison La Recette — Fiche Expérience')
@section('description', 'Détails et réservation de l’expérience culinaire Maison La Recette.')

@php
    try {
        $experience = \App\Models\Experience::query()->find($id ?? 1);
    } catch (\Throwable $e) {
        $experience = null;
    }

    if (!$experience) {
        $experience = (object)[
            'id' => $id ?? 1,
            'title' => 'Table Partagée : Dîner immersif de saison',
            'presentation' => 'Un repas d’exception en 5 temps orchestré par nos chefs invités. Plats cuisinés minute devant vous, accords sur-mesure et discussions franches autour des produits.',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1200&auto=format&fit=crop',
            'slider_images_url' => [
                'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop',
                'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800&auto=format&fit=crop',
            ]
        ];
    }
@endphp

@push('main')
    {{-- En-tête de l'expérience --}}
    <div class="w-full bg-[#171717] text-white pt-32 pb-16 px-6 md:px-16">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('experiences.index') }}" class="inline-flex items-center text-xs font-semibold text-[#C8C8C8] hover:text-white mb-4">
                ← Retour à toutes les expériences
            </a>
            <h1 class="text-4xl md:text-5xl font-semibold tracking-tight mb-4">
                {{ $experience->title }}
            </h1>
            <p class="text-base md:text-lg text-[#C8C8C8] leading-relaxed">
                {!! strip_tags($experience->presentation) !!}
            </p>
        </div>
    </div>

    {{-- Contenu & Galerie --}}
    <section class="w-full py-16 px-6 md:px-16 bg-white">
        <div class="max-w-5xl mx-auto">
            <div class="rounded-3xl overflow-hidden shadow-sm aspect-16/9 bg-[#E5E5E5] mb-12">
                <img
                    src="{{ $experience->thumbnail_url ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1200&auto=format&fit=crop' }}"
                    alt="{{ $experience->title }}"
                    class="w-full h-full object-cover"
                />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="md:col-span-2 space-y-6 text-[#626262] leading-relaxed">
                    <h2 class="text-2xl font-bold text-[#171717]">Le déroulé de l'expérience</h2>
                    <p>
                        Chaque session accueille un groupe intime de participants pour préserver la qualité des échanges. Vous découvrez l’histoire des ingrédients, observez les techniques en direct et prenez part aux étapes clés de préparation.
                    </p>
                    <p>
                        La dégustation se prolonge autour d'une grande table commune avec l'équipe et les producteurs partenaires.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-[#F9F9FB] border border-[#E5E5E5] flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-[#171717] mb-2">Participer ou privatiser</h3>
                        <p class="text-xs text-[#626262] leading-relaxed mb-6">
                            Vous souhaitez réserver pour un groupe, une entreprise ou obtenir une date sur-mesure ?
                        </p>
                    </div>

                    <x-ui.button :url="route('contact.index')" variant="primary">
                        Faire une demande ↗
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact & FAQ --}}
    <x-sections.home.faq />
@endpush
