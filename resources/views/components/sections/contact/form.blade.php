@props([
    'selectedExperiences' => [],
])

<x-layout.section width="3xl">
    <x-ui.panel>
        <x-forms.contact-form :selected-experiences="$selectedExperiences" />
    </x-ui.panel>
</x-layout.section>
