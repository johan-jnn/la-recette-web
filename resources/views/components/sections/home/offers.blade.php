@props([
    'eyebrow' => 'Offre podcast',
    'title' => 'Amplifiez votre impact grâce au podcast',
    'description' => 'La recette met son expertise en création éditoriale et en réalisation audio et vidéo au service des acteur·ices de l’alimentation durable : sponsoring, production de podcasts de l’idée à la diffusion, conférences et tables rondes enregistrées lors de vos évènements.',
    'image' => asset('images/home/offres-podcast.jpg'),
])

{{-- Bandeau vert foncé "offres podcast" --}}
<x-layout.section bg="forest">
    <x-slot:decor>
        <x-ui.decor name="leaf-dark" width="474" height="414" class="left-[73.75%] top-[89px] w-[474px] h-[414px] hidden md:block" />
    </x-slot:decor>

    <x-ui.media-text :image="$image" image-alt="Enregistrement d'un épisode du podcast" :eyebrow="$eyebrow" :title="$title" tone="light" reverse image-class="h-[310px] rounded-card">
        <p>{{ $description }}</p>

        <x-slot:actions>
            <x-ui.button :url="route('podcasts.index')" variant="white">Écouter le podcast</x-ui.button>
            <x-ui.button :url="route('studio')" variant="sun-light">Découvrir nos offres podcast</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
