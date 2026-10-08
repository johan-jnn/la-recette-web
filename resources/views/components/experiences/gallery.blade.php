@props([
    'images' => [], // chemins du disque "public" (slider_images_url)
    'alt' => '',
])

@if (!empty($images))
    <div {{ $attributes->merge(['class' => 'grid grid-cols-2 md:grid-cols-3 gap-4']) }}>
        @foreach ($images as $image)
            <div class="rounded-2xl overflow-hidden aspect-4/3 bg-[#E5E5E5]">
                <x-ui.image :src="$image" :alt="$alt . ' — photo ' . $loop->iteration" class="hover:scale-105 transition-transform duration-300" />
            </div>
        @endforeach
    </div>
@endif
