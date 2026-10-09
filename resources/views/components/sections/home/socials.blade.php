@props([
    'socials' => null,
    'title' => 'Retrouvons-nous aussi ici',
    'description' => null,
    'align' => 'left',
])

@php
    use App\Enums\Settings;
    use App\Models\Setting;

    // URLs administrables depuis Filament (Paramètres)
    $urls = Setting::query()
        ->whereIn('id', [Settings::INSTAGRAM_URL->value, Settings::LINKEDIN_URL->value])
        ->pluck('value', 'id');

    $socials ??= [
        [
            'network' => 'Instagram',
            'description' => 'Les coulisses du podcast, les rencontres avec nos invité·es et les prochaines expériences.',
            'link_label' => 'Suivre',
            'url' => $urls[Settings::INSTAGRAM_URL->value] ?? null,
        ],
        [
            'network' => 'LinkedIn',
            'description' => 'Les actualités du studio et les expériences pensées pour les entreprises : teambuildings, séminaires, afterworks.',
            'link_label' => 'Suivre',
            'url' => $urls[Settings::LINKEDIN_URL->value] ?? null,
        ],
    ];
@endphp

<x-layout.section bg="white" padding="pt-16 md:pt-[77px] pb-24 md:pb-[114px]">
    <x-slot:decor>
        <x-ui.decor name="strawberry" width="300" height="374" color="sage" class="left-[-72px] top-[309px] w-[300px] h-[374px] hidden md:block" />
    </x-slot:decor>

    <x-ui.section-heading :title="$title" :description="$description" :align="$align" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($socials as $social)
            <x-ui.text-card
                :title="$social['network']"
                :description="$social['description']"
                :link="filled($social['url']) ? ['label' => $social['link_label'], 'url' => $social['url'], 'external' => true] : null"
                :note="$social['note'] ?? null"
                tone="rose"
            />
        @endforeach
    </div>
</x-layout.section>
