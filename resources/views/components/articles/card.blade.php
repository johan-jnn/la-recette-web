@props([
    'article', // App\Models\Article
    'tone' => 'muted',
])

@php
    // Pas encore de page article : le lien sera actif dès que la route "articles.show" existera
    $url = \Illuminate\Support\Facades\Route::has('articles.show') ? route('articles.show', $article) : null;
@endphp

<x-ui.media-card
    :image="$article->thumbnail_url"
    :meta="$article->created_at?->translatedFormat('d F Y')"
    :title="$article->title"
    :description="$article->description"
    :tone="$tone"
    {{ $attributes }}
>
    @if ($url)
        <x-slot:footer>
            <x-ui.text-link :url="$url">Lire l'article ↗</x-ui.text-link>
        </x-slot:footer>
    @endif
</x-ui.media-card>
