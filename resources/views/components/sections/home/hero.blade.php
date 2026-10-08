@props([
    'eyebrow' => 'Podcast · Studio · Expériences',
    'title' => 'Et si on changeait le monde en mangeant ?',
    'description' => 'La recette part à la rencontre des artisan·es, chef·fes et producteur·trices qui façonnent l’alimentation de demain, pour décrypter les enjeux et les solutions de nos assiettes.',
    'image' => asset('images/home/hero.jpg'),
])

{{-- Hero de présentation : photo assombrie, feuille décorative et bord découpé --}}
<section class="relative min-h-[560px] overflow-hidden px-6 md:px-20 pt-24 pb-28 md:pt-[143px] md:pb-[100px] text-white">
    <div aria-hidden="true" class="absolute inset-0">
        <img src="{{ $image }}" alt="" class="size-full object-cover lg:absolute lg:left-0 lg:top-[0.08%] lg:w-[177.85%] lg:h-[283.64%] lg:max-w-none" />
        <div class="absolute inset-0 bg-black/25"></div>
    </div>

    <x-ui.decor name="hero-leaf" width="568" height="804" class="left-[65.3%] top-40 w-[568px] h-[804px] hidden lg:block" />

    <div class="relative flex flex-col items-start gap-7">
        <p class="text-sm font-semibold uppercase">{{ $eyebrow }}</p>
        <h1 class="text-5xl md:text-display font-bold max-w-[840px]">{{ $title }}</h1>
        <p class="text-lead max-w-[640px]">{{ $description }}</p>

        <div class="flex flex-wrap gap-4">
            <x-ui.button url="#podcasts">Écouter le podcast</x-ui.button>
            <x-ui.button :url="route('experiences.index')" variant="rose">Découvrir les expériences</x-ui.button>
        </div>
    </div>

    <x-ui.wave class="bottom-0" />
</section>
