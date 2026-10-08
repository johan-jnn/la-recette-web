@php
    use App\Enums\Settings;
    use App\Models\Setting;
    use Illuminate\Support\Facades\Route;

    // URLs administrables depuis Filament (Paramètres) ; un lien sans URL n'est pas affiché
    $urls = Setting::query()
        ->whereIn('id', [Settings::INSTAGRAM_URL->value, Settings::LINKEDIN_URL->value, Settings::TRUST_PILOT_URL->value])
        ->pluck('value', 'id');

    $socials = collect([
        ['label' => 'Instagram', 'url' => $urls[Settings::INSTAGRAM_URL->value] ?? null, 'external' => true],
        ['label' => 'LinkedIn', 'url' => $urls[Settings::LINKEDIN_URL->value] ?? null, 'external' => true],
        ['label' => 'Trustpilot', 'url' => $urls[Settings::TRUST_PILOT_URL->value] ?? null, 'external' => true],
    ])->filter(fn ($link) => filled($link['url']))->values()->all();

    $footerNavs = [
        'Explorer' => [
            ['label' => 'Podcast', 'url' => route('podcasts.index')],
            ['label' => 'Expériences', 'url' => route('experiences.index')],
            ['label' => 'Entreprises', 'url' => Route::has('companies') ? route('companies') : route('contact.index')],
            ['label' => 'À propos', 'url' => route('about')],
            ['label' => 'Contact', 'url' => route('contact.index')],
        ],
        'Nous suivre' => $socials,
        'Informations' => [
            ['label' => 'Mentions légales', 'url' => '#'],
            ['label' => 'Politique de confidentialité', 'url' => '#'],
            ['label' => 'Gestion des cookies', 'url' => '#'],
        ],
    ];
@endphp

<footer class="relative overflow-hidden bg-forest text-white px-6 md:px-20 py-14">
    <x-ui.decor name="footer-shape" width="558" height="501" class="right-[-5.9%] bottom-[-17%] w-[558px] h-[501px] hidden md:block" />

    <div class="relative max-w-page mx-auto flex flex-col gap-10">
        <x-layout.newsletter data-reveal />

        <hr class="border-0 h-px bg-line" />

        <div data-reveal-stagger class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[300px_190px_170px_280px] lg:justify-between gap-10">
            <div class="flex flex-col gap-5">
                <p class="text-[22px] font-bold uppercase">{{ config('app.name', 'Maison La Recette') }}</p>
                <p class="text-sm leading-[1.55]">Podcast, studio et expériences pour accélérer la transition alimentaire.</p>
            </div>

            @foreach ($footerNavs as $heading => $links)
                <x-layout.footer-links :heading="$heading" :links="$links" />
            @endforeach
        </div>

        <p class="text-sm leading-[1.55]">
            &copy; {{ date('Y') }} {{ config('app.name', 'Maison La Recette') }} · Tous droits réservés.
        </p>
    </div>
</footer>
