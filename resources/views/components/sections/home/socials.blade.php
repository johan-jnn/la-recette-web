@props([
    'socials' => [],
])

@php
    if (empty($socials)) {
        $socials = [
            [
                'network' => 'Instagram',
                'description' => 'Les coulisses du podcast, les moments partagés et les prochaines rencontres.',
                'link_label' => 'Voir Instagram ↗',
                'url' => 'https://instagram.com',
                'note' => 'Compte et lien à renseigner.',
            ],
            [
                'network' => 'LinkedIn',
                'description' => 'Les actualités du projet et les expériences pensées pour les entreprises.',
                'link_label' => 'Voir LinkedIn ↗',
                'url' => 'https://linkedin.com',
                'note' => 'Page et lien à renseigner.',
            ],
        ];
    }
@endphp

<section class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB]">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-semibold text-[#171717] tracking-tight mb-2">
                Retrouvons-nous aussi ici
            </h2>
            <p class="text-sm text-[#808080]">
                Suivez nos actualités et rejoignez la communauté.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($socials as $social)
                <div class="p-8 rounded-2xl bg-white border border-[#E5E5E5] flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <h3 class="text-xl font-bold text-[#171717] mb-2">{{ $social['network'] }}</h3>
                        <p class="text-sm text-[#626262] leading-relaxed mb-6">{{ $social['description'] }}</p>
                    </div>

                    <div>
                        <a
                            href="{{ $social['url'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center text-sm font-semibold text-[#171717] hover:underline"
                        >
                            {{ $social['link_label'] }}
                        </a>
                        @if (!empty($social['note']))
                            <p class="text-xs text-[#808080] mt-1">{{ $social['note'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
