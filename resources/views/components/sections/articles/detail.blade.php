@props([
    'article', // App\Models\Article
])

{{-- Contenu d'un article : visuel, chapeau et corps (RichEditor Filament) --}}
<x-layout.section bg="white">
    <article class="mx-auto flex max-w-3xl flex-col gap-10">
        <x-ui.media :src="$article->thumbnail_url" :alt="$article->title" :lazy="false" class="aspect-video w-full" />

        @if ($article->description)
            <p class="text-lead font-medium text-forest">{{ $article->description }}</p>
        @endif

        <x-ui.prose :html="$article->body" />
    </article>
</x-layout.section>
