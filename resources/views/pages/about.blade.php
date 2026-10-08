@extends('layouts.page')

@section('title', 'Maison La Recette — À propos')
@section('description', 'Découvrez la vision, l’histoire et les valeurs fondatrices de Maison La Recette.')

@php
    $values = [
        [
            'title' => 'L’Amour du Vivant & du Goût',
            'desc' => 'Valoriser le travail minutieux des agriculteurs, vignerons et artisans qui préservent la richesse de nos terroirs.',
        ],
        [
            'title' => 'La Transmission & le Partage',
            'desc' => 'Démystifier les savoir-faire culinaires par des formats accessibles, pédagogiques et chaleureux.',
        ],
        [
            'title' => 'L’Immersion & la Convivialité',
            'desc' => 'Créer de véritables moments d’échange autour d’une table généreuse où chaque bouchée raconte une histoire.',
        ],
    ];
@endphp

@push('main')
    {{-- Hero Page À propos --}}
    <div class="w-full bg-[#171717] text-white pt-32 pb-20 px-6 md:px-16 text-center">
        <div class="max-w-4xl mx-auto">
            <span class="text-xs uppercase tracking-widest font-semibold text-[#C8C8C8] block mb-3">
                Notre Histoire
            </span>
            <h1 class="text-4xl md:text-5xl font-semibold tracking-tight mb-6">
                La cuisine, un patrimoine vivant qui se partage
            </h1>
            <p class="text-base md:text-lg text-[#C8C8C8] max-w-2xl mx-auto leading-relaxed">
                Maison La Recette est née d’une conviction simple : derrière chaque plat se cache une voix, un geste, un terroir qui méritent d’être racontés et vécus ensemble.
            </p>
        </div>
    </div>

    {{-- Section Histoire & Vision --}}
    <section class="w-full py-20 px-6 md:px-16 bg-white">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 text-[#626262] leading-relaxed text-base">
                <h2 class="text-3xl font-semibold text-[#171717] tracking-tight">
                    Du micro de podcast à la table d'hôte
                </h2>
                <p>
                    Au commencement était le son : donner la parole à celles et ceux qui cultivent, élèvent, fermentent et réinventent l’alimentation contemporaine.
                </p>
                <p>
                    Très vite, l’envie d’aller au-delà des mots s’est imposée. De transformer l’écoute en dégustation, la curiosité en expérience physique. C’est ainsi que sont nés nos ateliers immersifs et nos tables partagées.
                </p>
                <div class="pt-2">
                    <x-ui.button :url="route('experiences.index')" variant="primary">
                        Découvrir nos expériences ↗
                    </x-ui.button>
                </div>
            </div>

            <div class="rounded-3xl overflow-hidden shadow-sm aspect-4/3 bg-[#E5E5E5]">
                <img
                    src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1000&auto=format&fit=crop"
                    alt="Atelier et rencontre culinaire"
                    class="w-full h-full object-cover"
                />
            </div>
        </div>
    </section>

    {{-- Section Valeurs (Boucle dynamique conforme REFERENCE.md) --}}
    <section class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB]">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                    Ce qui nous anime
                </span>
                <h2 class="text-3xl font-semibold text-[#171717] tracking-tight">
                    Nos piliers fondateurs
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($values as $val)
                    <div class="bg-white p-8 rounded-2xl border border-[#E5E5E5] flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div>
                            <h3 class="text-xl font-bold text-[#171717] mb-3">{{ $val['title'] }}</h3>
                            <p class="text-sm text-[#626262] leading-relaxed">{{ $val['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Newsletter & Réseaux --}}
    <x-sections.home.socials />
    <x-sections.home.newsletter />
@endpush
