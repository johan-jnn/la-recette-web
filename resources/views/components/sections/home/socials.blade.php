@props([
    'socials' => null,
    'title' => 'Retrouvons-nous aussi ici',
    'description' => 'Suivez nos actualités et rejoignez la communauté de La recette.',
    'align' => 'center',
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
            'link_label' => 'Voir Instagram',
            'url' => $urls[Settings::INSTAGRAM_URL->value] ?? null,
        ],
        [
            'network' => 'LinkedIn',
            'description' => 'Les actualités du studio et les expériences pensées pour les entreprises : teambuildings, séminaires, afterworks.',
            'link_label' => 'Voir LinkedIn',
            'url' => $urls[Settings::LINKEDIN_URL->value] ?? null,
        ],
    ];
@endphp

<x-layout.section>
    <x-ui.section-heading :title="$title" :description="$description" :align="$align" />

    <div data-reveal-stagger class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($socials as $social)
            <x-ui.text-card
                :title="$social['network']"
                :description="$social['description']"
                :link="filled($social['url']) ? ['label' => $social['link_label'], 'url' => $social['url'], 'external' => true] : null"
                :note="$social['note'] ?? null"
            />
        @endforeach
    </div>
</x-layout.section>
