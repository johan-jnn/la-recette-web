@php
    // Réseaux sociaux : pas encore en base, liens à renseigner
    $socials = [
        ['label' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://instagram.com'],
        ['label' => 'LinkedIn', 'icon' => 'linkedin', 'url' => 'https://linkedin.com'],
    ];

    $legalLinks = [
        ['label' => 'Mentions légales', 'url' => '#'],
        ['label' => 'Politique de confidentialité', 'url' => '#'],
        ['label' => 'Gestion des cookies', 'url' => '#'],
    ];

    // URL Trustpilot administrable depuis Filament (Paramètres)
    $trustPilotUrl = \App\Models\Setting::find(\App\Enums\Settings::TRUST_PILOT_URL->value)?->value;

    $followLinks = collect($socials)
        ->map(fn ($social) => ['label' => $social['label'] . ' ↗', 'url' => $social['url'], 'external' => true])
        ->when($trustPilotUrl, fn ($links) => $links->push(['label' => 'Avis Trustpilot ↗', 'url' => $trustPilotUrl, 'external' => true]))
        ->all();

    $footerNavs = [
        'Explorer' => [
            ['label' => 'Podcast & Articles', 'url' => route('articles.index')],
            ['label' => 'Expériences', 'url' => route('experiences.index')],
            ['label' => 'À propos', 'url' => route('about')],
            ['label' => 'Contact', 'url' => route('contact.index')],
        ],
        'Nous suivre' => $followLinks,
        'Informations' => $legalLinks,
    ];
@endphp

<footer class="bg-[#111111] text-white px-6 md:px-16 pt-16 pb-8">
    <div class="max-w-6xl mx-auto">
        <div class="border-t border-white/10 mb-14"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-14">
            {{-- Branding --}}
            <div>
                <x-layout.logo class="text-xl text-white mb-4" />
                <p class="text-sm text-white/50 leading-relaxed max-w-xs">
                    Des histoires à écouter.<br>Des moments à partager.
                </p>

                <div class="flex items-center gap-3 mt-6">
                    @foreach ($socials as $social)
                        <x-layout.social-icon :url="$social['url']" :icon="$social['icon']" :label="$social['label']" />
                    @endforeach
                </div>
            </div>

            @foreach ($footerNavs as $heading => $links)
                <x-layout.footer-links :heading="$heading" :links="$links" />
            @endforeach
        </div>

        <div class="border-t border-white/10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-white/30">
                &copy; {{ date('Y') }} {{ config('app.name', 'Maison La Recette') }} · Tous droits réservés.
            </p>
            <div class="flex items-center gap-6">
                @foreach ($legalLinks as $link)
                    <a href="{{ $link['url'] }}" class="text-xs text-white/30 hover:text-white/60 transition-colors">{{ $link['label'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
