@extends('layouts.page')

@section('title', 'Maison La Recette — Podcast & Articles')
@section('description', 'Retrouvez tous les épisodes du podcast Maison La Recette ainsi que nos articles et réflexions autour de la cuisine, des terroirs et des rencontres.')

@php
    // --- Podcasts (depuis la BDD ou fallback mock) ---
    try {
        $podcasts = \App\Models\Podcast::query()->latest('publish_date')->get();
    } catch (\Throwable $e) {
        $podcasts = collect();
    }

    if ($podcasts->isEmpty()) {
        $podcasts = collect([
            (object)[
                'id' => 1,
                'title' => 'Aux origines du goût et de la terre',
                'description' => 'Une immersion avec des producteurs passionnés qui réinventent nos assiettes au quotidien avec des produits sourcés localement.',
                'cover_url' => 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=800&auto=format&fit=crop',
                'publish_date' => '2025-03-12',
                'duration' => null,
            ],
            (object)[
                'id' => 2,
                'title' => 'L\'art de la fermentation artisanale',
                'description' => 'Comprendre les mystères et bienfaits des levains, kéfirs et saveurs fermentées oubliées de nos grands-mères.',
                'cover_url' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800&auto=format&fit=crop',
                'publish_date' => '2025-04-05',
                'duration' => null,
            ],
            (object)[
                'id' => 3,
                'title' => 'Rencontre autour du feu et des braises',
                'description' => 'Techniques ancestrales de cuisson et retour à l\'essentiel racontés par nos chefs invités et feu-maîtres.',
                'cover_url' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop',
                'publish_date' => '2025-05-18',
                'duration' => null,
            ],
            (object)[
                'id' => 4,
                'title' => 'Vins vivants et cépages résilients',
                'description' => 'Voyage au cœur des vignes naturelles avec des vignerons artisans du vivant et de la biodiversité.',
                'cover_url' => 'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=800&auto=format&fit=crop',
                'publish_date' => '2025-06-30',
                'duration' => null,
            ],
            (object)[
                'id' => 5,
                'title' => 'De la graine à l\'assiette étoilée',
                'description' => 'Dialogue inspirant entre maraîchers bio et chefs engagés pour la biodiversité et les circuits courts.',
                'cover_url' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?q=80&w=800&auto=format&fit=crop',
                'publish_date' => '2025-08-14',
                'duration' => null,
            ],
            (object)[
                'id' => 6,
                'title' => 'Épices, routes et mémoire des saveurs',
                'description' => 'Un tour du monde des épices rares avec des importateurs engagés et des cuisiniers voyageurs.',
                'cover_url' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop',
                'publish_date' => '2025-09-22',
                'duration' => null,
            ],
        ]);
    }

    // --- Articles (depuis la BDD ou fallback mock) ---
    try {
        $articles = \App\Models\Article::query()->latest()->get();
    } catch (\Throwable $e) {
        $articles = collect();
    }

    if ($articles->isEmpty()) {
        $articles = collect([
            (object)[
                'id' => 1,
                'title' => 'Comment choisir ses légumes de saison au marché ?',
                'description' => 'Nos conseils pratiques pour sélectionner les meilleurs produits chez vos maraîchers et artisans locaux.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?q=80&w=800&auto=format&fit=crop',
                'created_at' => '2025-08-20',
                'experience_id' => null,
            ],
            (object)[
                'id' => 2,
                'title' => 'Le levain maison : guide pour débutants',
                'description' => 'Toutes les étapes pour créer et entretenir votre levain naturel à la maison, avec les erreurs à éviter.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800&auto=format&fit=crop',
                'created_at' => '2025-09-10',
                'experience_id' => null,
            ],
            (object)[
                'id' => 3,
                'title' => 'Accords mets & vins naturels : nos coups de cœur',
                'description' => 'Une sélection de producteurs et de cuvées pour sublimer vos repas du quotidien avec des vins vivants.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=800&auto=format&fit=crop',
                'created_at' => '2025-09-28',
                'experience_id' => null,
            ],
        ]);
    }

    // Plateformes pour les liens d'écoute (mock)
    $platformIcons = [
        'Spotify' => [
            'color' => '#1DB954',
            'url' => 'https://spotify.com',
            'icon' => '<svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>',
        ],
        'Deezer' => [
            'color' => '#EF5466',
            'url' => 'https://deezer.com',
            'icon' => '<svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M18.944 11.705h3.388v2.045h-3.388zm-4.517 0h3.389v2.045h-3.389zm-4.517 0h3.388v2.045H9.91zm-4.519 0h3.39v2.045H5.391zM18.944 8.625h3.388V10.67h-3.388zm-4.517 0h3.389V10.67h-3.389zm-4.517 0h3.388V10.67H9.91zM18.944 5.543h3.388v2.045h-3.388zm-4.517 0h3.389v2.045h-3.389zM18.944 2.461h3.388v2.045h-3.388zM.668 14.787h3.39v2.045H.668zm4.519 0H8.58v2.045H5.187zm4.517 0h3.388v2.045H9.704zm4.517 0h3.389v2.045h-3.389zm4.517 0h3.388v2.045h-3.388zM.668 17.87h3.39v2.045H.668zm4.519 0H8.58v2.045H5.187zm4.517 0h3.388v2.045H9.704zm4.517 0h3.389v2.045h-3.389zm4.517 0h3.388v2.045h-3.388zm0 3.083h3.388v2.045h-3.388z"/></svg>',
        ],
        'Apple Podcasts' => [
            'color' => '#9c27b0',
            'url' => 'https://podcasts.apple.com',
            'icon' => '<svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm.81 16.68c0 .45-.36.81-.81.81s-.81-.36-.81-.81V11.1c0-.45.36-.81.81-.81s.81.36.81.81v5.58zm-.81-8.01a1.89 1.89 0 1 1 0-3.78 1.89 1.89 0 0 1 0 3.78z"/></svg>',
        ],
    ];
@endphp

@push('main')
    {{-- Hero de la page Podcasts & Articles --}}
    <div class="w-full bg-[#171717] text-white pt-32 pb-20 px-6 md:px-16">
        <div class="max-w-4xl mx-auto text-center">
            <span class="text-xs uppercase tracking-widest font-semibold text-[#C8C8C8] block mb-3">
                À écouter & à lire
            </span>
            <h1 class="text-4xl md:text-6xl font-medium tracking-tight leading-tight mb-6">
                Podcast & Articles
            </h1>
            <p class="text-base md:text-lg text-[#C8C8C8] max-w-2xl mx-auto leading-relaxed mb-10">
                Des conversations profondes avec celles et ceux qui font la cuisine, et des ressources pour approfondir vos connaissances culinaires.
            </p>

            {{-- Écouter sur les plateformes --}}
            <div class="flex flex-wrap items-center justify-center gap-3">
                @foreach ($platformIcons as $label => $platform)
                    <a
                        href="{{ $platform['url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 text-white text-sm font-medium transition-all"
                    >
                        {!! $platform['icon'] !!}
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Section Derniers Épisodes (liste complète) --}}
    <section class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB]">
        <div class="max-w-6xl mx-auto">
            <div class="mb-12">
                <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                    À écouter
                </span>
                <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight">
                    Tous les épisodes
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($podcasts as $index => $podcast)
                    <article class="bg-white rounded-3xl border border-[#E5E5E5] overflow-hidden flex flex-col justify-between hover:shadow-md transition-all group">
                        <div>
                            {{-- Cover image --}}
                            <div class="w-full aspect-square bg-[#E5E5E5] overflow-hidden relative">
                                <img
                                    src="{{ $podcast->cover_url ?? 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=800&auto=format&fit=crop' }}"
                                    alt="{{ $podcast->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                />
                                {{-- Numéro d'épisode --}}
                                <div class="absolute top-4 left-4 bg-[#171717]/80 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full">
                                    Épisode {{ $loop->iteration }}
                                </div>
                            </div>

                            <div class="p-6">
                                @if ($podcast->publish_date)
                                    <span class="text-xs text-[#808080] block mb-2">
                                        {{ \Carbon\Carbon::parse($podcast->publish_date)->translatedFormat('d F Y') }}
                                    </span>
                                @endif
                                <h3 class="text-lg font-bold text-[#171717] mb-2 line-clamp-2 leading-snug">
                                    {{ $podcast->title }}
                                </h3>
                                <p class="text-sm text-[#626262] line-clamp-3 leading-relaxed">
                                    {{ $podcast->description }}
                                </p>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="p-6 pt-0 flex items-center gap-4 border-t border-[#F0F0F0] mt-4">
                            <a href="#" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#1C4937] hover:underline">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Écouter
                            </a>
                            @if ($podcast->duration)
                                <span class="text-xs text-[#808080] ml-auto">{{ $podcast->duration }}</span>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Séparateur avec CTA plateformes --}}
    <section class="w-full py-16 px-6 md:px-16 bg-[#1C4937] text-white text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight mb-3">
                Abonnez-vous pour ne rien rater
            </h2>
            <p class="text-sm text-white/75 mb-8">
                Retrouvez Maison La Recette sur votre plateforme d'écoute préférée.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                @foreach ($platformIcons as $label => $platform)
                    <a
                        href="{{ $platform['url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/15 hover:bg-white/25 border border-white/25 text-white text-sm font-medium transition-all"
                    >
                        {!! $platform['icon'] !!}
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section Articles --}}
    @if ($articles->isNotEmpty())
        <section class="w-full py-20 px-6 md:px-16 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="mb-12">
                    <span class="text-xs uppercase tracking-widest font-semibold text-[#808080] block mb-2">
                        À lire
                    </span>
                    <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight">
                        Nos articles & ressources
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($articles as $article)
                        <article class="bg-[#F9F9FB] rounded-3xl border border-[#E5E5E5] overflow-hidden flex flex-col hover:shadow-md transition-all group">
                            <div class="w-full h-52 bg-[#E5E5E5] overflow-hidden">
                                <img
                                    src="{{ $article->thumbnail_url ?? 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop' }}"
                                    alt="{{ $article->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                />
                            </div>
                            <div class="p-6 flex flex-col flex-1 justify-between">
                                <div>
                                    @if ($article->created_at)
                                        <span class="text-xs text-[#808080] block mb-2">
                                            {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}
                                        </span>
                                    @endif
                                    <h3 class="text-lg font-bold text-[#171717] mb-2 line-clamp-2 leading-snug">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-sm text-[#626262] line-clamp-3 leading-relaxed mb-6">
                                        {{ $article->description ?? strip_tags($article->body ?? '') }}
                                    </p>
                                </div>
                                <a href="#" class="inline-flex items-center text-sm font-semibold text-[#1C4937] hover:underline">
                                    Lire l'article ↗
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Sections réutilisables --}}
    <x-sections.home.newsletter />
@endpush
