@props([
    'title' => 'La cuisine se raconte. Et se partage.',
    'subtitle' => 'PODCAST & EXPÉRIENCES CULINAIRES',
    'description' => 'Des histoires de celles et ceux qui font la cuisine, et des expériences pour se rencontrer autour de la table.',
    'podcastUrl' => '#podcasts',
    'experiencesUrl' => route('experiences.index'),
])

<section class="relative w-full bg-[#171717] text-white pt-28 pb-20 md:py-36 px-6 md:px-16 overflow-hidden">
    <div class="max-w-5xl mx-auto flex flex-col items-center text-center relative z-10">
        @if ($subtitle)
            <span class="inline-block text-xs uppercase tracking-widest font-semibold text-[#C8C8C8] mb-4">
                {{ $subtitle }}
            </span>
        @endif

        <h1 class="text-4xl md:text-6xl font-medium tracking-tight leading-tight md:leading-tight mb-6 max-w-3xl">
            {{ $title }}
        </h1>

        @if ($description)
            <p class="text-base md:text-lg text-[#C8C8C8] max-w-2xl mb-10 leading-relaxed font-normal">
                {{ $description }}
            </p>
        @endif

        <div class="flex flex-wrap items-center justify-center gap-4">
            <x-ui.button :url="$podcastUrl" variant="light">
                Écouter le podcast
            </x-ui.button>

            <x-ui.button :url="$experiencesUrl" variant="outline-white">
                Découvrir les expériences
            </x-ui.button>
        </div>
    </div>
</section>
