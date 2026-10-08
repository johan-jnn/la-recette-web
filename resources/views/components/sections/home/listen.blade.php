@props([
    'title' => 'Écouter à votre rythme',
    'description' => 'Plus de 40 épisodes, 50 000 écoutes et une note de 4,9/5 : retrouvez La recette sur votre plateforme habituelle.',
])

{{-- Bandeau vert "Écouter à votre rythme" avec les plateformes d'écoute --}}
<div class="px-4 md:px-10 py-5 bg-cream">
    <div data-reveal class="grid grid-cols-1 md:grid-cols-2 gap-8 rounded-card bg-sage px-[30px] py-[50px] text-white">
        <div class="flex flex-col gap-5">
            <h2 class="text-title font-bold">{{ $title }}</h2>
            <p class="text-body-lg">{{ $description }}</p>
        </div>

        <x-podcasts.platform-links class="md:items-start md:self-start" />
    </div>
</div>
