@props([
    'article', // App\Models\Article
    'buttonVariant' => 'sun', // sun (accueil), rose (blog), sage (suite de lecture)
    'buttonIcon' => false, // flèche après le libellé
])

@php
    // Pas encore de page article : repli sur la liste tant que "articles.show" n'existe pas
    $url = \Illuminate\Support\Facades\Route::has('articles.show')
        ? route('articles.show', $article)
        : route('articles.index');

    // Sur-titre : expérience associée et/ou date de publication
    $meta = collect([$article->experience?->title, $article->created_at?->translatedFormat('d F Y')])->filter()->join(' · ');
@endphp

{{-- Carte article (composant Figma "Cards Article") --}}
<article {{ $attributes->merge(['class' => 'flex flex-col gap-[18px]']) }}>
    <x-ui.media :src="$article->thumbnail_url" :alt="$article->title" class="h-[220px] w-full" />

    @if ($meta)
        <p class="text-sm leading-[1.55] text-muted">{{ $meta }}</p>
    @endif

    <h3 class="text-subtitle font-bold text-forest">{{ $article->title }}</h3>

    <p class="text-body-lg text-muted line-clamp-3">{{ $article->description }}</p>

    <x-ui.button :url="$url" :variant="$buttonVariant" class="self-center mt-auto">
        Lire l’article
        @if ($buttonIcon)
            <x-ui.icon name="arrow-up-right" size="w-4 h-4" />
        @endif
    </x-ui.button>
</article>
