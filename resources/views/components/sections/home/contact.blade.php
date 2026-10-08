@props([
    'title' => 'Nous contacter',
    'subtitle' => 'Une question, un devis ou une proposition ?',
])

<x-layout.section id="contact" width="3xl">
    <x-ui.section-heading :title="$title" :description="$subtitle" align="center" spacing="mb-10" />

    <x-ui.panel padding="p-8 md:p-10">
        <x-forms.contact-form />
    </x-ui.panel>
</x-layout.section>
