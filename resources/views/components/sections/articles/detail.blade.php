@props([
    'article', // App\Models\Article
    'author' => 'La rédaction de Maison la recette',
    'authorBio' => 'Le podcast, le studio et les expériences de La recette, pour explorer les coulisses de nos assiettes.',
])

{{-- Article : en-tête (sur-titre, titre, chapeau, auteur), visuel, corps (RichEditor Filament) et signature --}}
<x-layout.section bg="white" padding="pt-12 md:pt-[110px] pb-24 md:pb-[100px]">
    <x-slot:decor>
        <x-ui.wave />
    </x-slot:decor>

    <article class="flex flex-col gap-10">
        <header data-reveal class="flex flex-col items-start gap-5 text-forest">
            <p class="text-xs font-bold uppercase">
                @if ($article->experience)
                    <a href="{{ route('experiences.show', ['id' => $article->experience->id]) }}" class="hover:underline underline-offset-4">{{ $article->experience->title }}</a>
                @else
                    Blog
                @endif
            </p>
            <h1 class="text-4xl md:text-[3.25rem] font-bold leading-[1.15]">{{ $article->title }}</h1>
            @if ($article->description)
                <p class="text-lead text-muted max-w-[640px]">{{ $article->description }}</p>
            @endif
            <p class="text-xs text-muted">{{ $author }} · {{ $article->created_at?->translatedFormat('d F Y') }}</p>
        </header>

        <x-ui.media :src="$article->thumbnail_url" :alt="$article->title" :lazy="false" radius="rounded-image" class="h-64 md:h-[480px] w-full" />

        <x-ui.prose :html="$article->body" />

        <footer class="flex flex-col items-start gap-4 border-t border-line pt-8 text-forest">
            <p class="text-base font-bold">{{ $author }}</p>
            <p class="text-sm text-muted">{{ $authorBio }}</p>
            <x-ui.button :url="route('articles.index')">Retour au blog</x-ui.button>
        </footer>
    </article>
</x-layout.section>
