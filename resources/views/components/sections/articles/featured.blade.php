@props([
    'articles' => null,
    'limit' => 3,
    'eyebrow' => 'À la une',
])

@php
    $articles ??= \App\Models\Article::query()->with('experience')->latest()->take($limit)->get();
@endphp

{{-- Articles à la une : carte verte en diaporama (visuel, sur-titre, titre, chapeau, date, bouton) --}}
@if ($articles->isNotEmpty())
    <x-layout.section bg="white" padding="pt-12 md:pt-[90px] pb-0">
        <h1 class="sr-only">Blog</h1>

        <div data-reveal x-data="{ slide: 0, total: {{ $articles->count() }} }" class="flex flex-col items-center gap-[10px]">
            <div class="relative grid w-full overflow-hidden rounded-card bg-sage">
                <x-ui.decor name="citrus-slice" width="488" height="461" color="cream" class="left-[66.9%] top-[59.6%] w-[488px] h-[461px] hidden lg:block" />

                @foreach ($articles as $article)
                    @php($url = route('articles.show', $article))

                    <article
                        class="relative col-start-1 row-start-1 flex flex-col gap-8 p-6 md:flex-row md:items-center md:gap-12 md:p-8 transition-opacity duration-500"
                        x-bind:class="slide === {{ $loop->index }} ? 'opacity-100' : 'opacity-0 pointer-events-none'"
                        @if (!$loop->first) x-cloak @endif
                        x-bind:aria-hidden="slide !== {{ $loop->index }}"
                    >
                        <x-ui.media :src="$article->thumbnail_url" :alt="$article->title" :lazy="!$loop->first" class="h-64 w-full md:h-[391px] md:w-[570px] shrink-0" />

                        <div class="flex flex-col items-start gap-5 text-cream md:max-w-[590px]">
                            <p class="text-xs font-bold uppercase">
                                {{ collect([$eyebrow, $article->experience?->title])->filter()->join(' · ') }}
                            </p>
                            <h2 class="text-title font-bold">{{ $article->title }}</h2>
                            @if ($article->description)
                                <p class="text-body-lg line-clamp-3">{{ $article->description }}</p>
                            @endif
                            <p class="text-xs">{{ $article->created_at?->translatedFormat('d F Y') }}</p>
                            <x-ui.button :url="$url" variant="forest">
                                Lire l’article
                                <x-ui.icon name="arrow-up-right" size="w-4 h-4" />
                            </x-ui.button>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($articles->count() > 1)
                <div class="flex items-center justify-center gap-1">
                    @foreach ($articles as $article)
                        <button
                            type="button"
                            @click="slide = {{ $loop->index }}"
                            class="rounded-pill transition-all duration-300 cursor-pointer"
                            :class="slide === {{ $loop->index }} ? 'w-9 h-3 bg-forest' : 'size-3 bg-forest/30'"
                            aria-label="Afficher l’article {{ $loop->iteration }}"
                        ></button>
                    @endforeach
                </div>
            @endif
        </div>
    </x-layout.section>
@endif
