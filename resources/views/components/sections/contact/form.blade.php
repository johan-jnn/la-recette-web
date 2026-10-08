@props([
    'selectedExperiences' => [],
])

<x-layout.section bg="muted" width="3xl" padding="py-16">
    <x-ui.panel>
        <x-forms.contact-form :selected-experiences="$selectedExperiences" />
    </x-ui.panel>
</x-layout.section>
