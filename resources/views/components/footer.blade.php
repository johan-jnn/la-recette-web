@php
    $navs = [
        'Explorer' => [
            'Podcast' => '/podcast',
            'Expérience' => '/experiences',
            'Entreprise' => '/entreprise',
            'A propos' => '/histoire',
            'Contact' => '/contact',
        ],
        'Nous suivre' => [
            'Instagram' => 'https://instagram.com',
            'LinkedIn' => 'https://linkedin.com',
        ],
        'Informations' => [
            'Mentions légales' => '/mentions',
            'Politique de confidentialité' => '/rgpd',
            'Gestion des cookies' => '/cookies',
        ],
    ];
@endphp

<footer class="bg-gray-200 px-8 py-4">
    <div class="max-w-260 mx-auto">
        <hr>

        <ul class="flex my-8 justify-between align-top p-4">
            <li>
                <p class="uppercase text-xl font-bold">{{ env('APP_NAME') }}</p>
                <p class="text-xs">Des histoires à écouter. Des moments à partager.</p>
            </li>
            @foreach ($navs as $heading => $nav)
                @continue(!count($nav))

                <li>
                    <h3 class="font-bold">{{ $heading }}</h3>
                    <ul class="mt-4 grid gap-4">
                        @foreach ($nav as $label => $url)
                            <li>
                                <a class="flex items-center gap-2 hover:underline" href="{{ $url }}">
                                    {{ $label }}
                                    @php
                                        $urlHost = Uri::of($url)->host();
                                    @endphp

                                    @if ($urlHost && $urlHost != env('APP_URL'))
                                        @svg('iconpark-arrowrightup-o', 'size-4')
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

        <p class="text-xs opacity-60">MONDE LA RECETTE · Wireframe desktop · Formulaires, liens et préférences
            représentés
            sans
            interaction.</p>
    </div>

</footer>
