@props([
    'eyebrow' => 'Découvrez nos offres podcasts',
    'title' => 'Trouve l’épisode qui te convient au mieux ou crée le tien !',
    'description' => 'Écoute notre podcast ou contacte-nous pour créer le tien !',
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
            <x-ui.button :url="route('articles.index') . '#episodes'" variant="white">Trouver mon épisode</x-ui.button>
            <x-ui.button :url="route('contact.index')" variant="sun-light">Découvrir nos offres podcast</x-ui.button>
        </x-slot:actions>
    </x-ui.media-text>
</x-layout.section>
