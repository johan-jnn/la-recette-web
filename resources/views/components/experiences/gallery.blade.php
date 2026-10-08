@props([
    'images' => [], // chemins du disque "public" (slider_images_url)
    'alt' => '',
])

@if (!empty($images))
    <div data-reveal-stagger {{ $attributes->merge(['class' => 'grid grid-cols-2 md:grid-cols-3 gap-6']) }}>
        @foreach ($images as $image)
            <x-ui.media :src="$image" :alt="$alt . ' — photo ' . $loop->iteration" radius="rounded-image" class="aspect-4/3" />
        @endforeach
    </div>
@endif
