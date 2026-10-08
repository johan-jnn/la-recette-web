@props([
    'experience', // App\Models\Experience
])

<x-layout.section>
    <x-ui.media :src="$experience->thumbnail_url" :alt="$experience->title" :lazy="false" class="aspect-video w-full mb-12" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
        <div class="md:col-span-2 flex flex-col gap-6">
            <h2 class="text-title font-bold text-forest">L’expérience</h2>
            <x-ui.prose :html="$experience->presentation" />
        </div>

        <x-experiences.booking-card :experience="$experience" class="md:sticky md:top-28" data-pin />
    </div>

    @if (!empty($experience->slider_images_url))
        <div class="mt-16 flex flex-col gap-8">
            <h2 data-reveal class="text-title font-bold text-forest">En images</h2>
            <x-experiences.gallery :images="$experience->slider_images_url" :alt="$experience->title" />
        </div>
    @endif
</x-layout.section>
