@props([
    'experience', // App\Models\Experience
])

<x-layout.section width="5xl" padding="py-16">
    <div class="rounded-3xl overflow-hidden shadow-sm aspect-video bg-[#E5E5E5] mb-12">
        <x-ui.image :src="$experience->thumbnail_url" :alt="$experience->title" :lazy="false" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-start">
        <div class="md:col-span-2">
            <h2 class="text-2xl font-bold text-[#171717] mb-6">L'expérience</h2>
            <x-ui.prose :html="$experience->presentation" />
        </div>

        <x-experiences.booking-card :experience="$experience" class="md:sticky md:top-32" />
    </div>

    @if (!empty($experience->slider_images_url))
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-[#171717] mb-6">En images</h2>
            <x-experiences.gallery :images="$experience->slider_images_url" :alt="$experience->title" />
        </div>
    @endif
</x-layout.section>
