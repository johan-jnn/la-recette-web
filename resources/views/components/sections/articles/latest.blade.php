@props([
    'perPage' => 6,
])

@php
    $articles = \App\Models\Article::query()->with('experience')->latest()->paginate($perPage);
@endphp

{{-- Liste paginée des articles, feuille décorative en bas à droite --}}
<x-layout.section id="articles" bg="white" class="overflow-hidden" padding="pt-16 md:pt-[72px] pb-16 md:pb-[72px]">
    <x-slot:decor>
        <x-ui.decor name="hero-leaf" width="568" height="804" color="sage" class="right-[-238px] bottom-[-273px] w-[464px] h-[656px] hidden xl:block" />
    </x-slot:decor>

    <x-ui.section-heading title="Les derniers articles">
        <p class="text-sm font-semibold text-forest underline underline-offset-4">
            {{ trans_choice(':count article|:count articles', $articles->total()) }} · Du plus récent au plus ancien
        </p>
    </x-ui.section-heading>

    <x-articles.grid :articles="$articles" button-variant="rose" button-icon />

    <x-ui.pagination :paginator="$articles" next-variant="rose" class="mt-12" />
</x-layout.section>
