@props([
    'podcast', // App\Models\Podcast (avec la relation "urls")
    'imageClass' => 'aspect-square',
])

<x-ui.media-card
    :image="$podcast->cover_url"
    :image-class="$imageClass"
    :meta="$podcast->publish_date ? \Illuminate\Support\Carbon::parse($podcast->publish_date)->translatedFormat('d F Y') : null"
    :title="$podcast->title"
    :description="$podcast->description"
    {{ $attributes }}
>
    <x-slot:footer class="justify-between">
        <x-podcasts.listen-links :urls="$podcast->urls" />
        <x-podcasts.duration :value="$podcast->duration" class="text-xs text-[#808080] ml-auto" />
    </x-slot:footer>
</x-ui.media-card>
