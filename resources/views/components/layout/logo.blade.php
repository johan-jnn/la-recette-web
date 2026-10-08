{{-- Logo "Maison la recette" (pictogramme + logotype), assets exportés de la maquette --}}
<a
    href="{{ route('home') }}"
    aria-label="{{ config('app.name', 'Maison La Recette') }} — Accueil"
    {{ $attributes->merge(['class' => 'relative inline-block w-[149px] h-[38px] shrink-0']) }}
>
    <img src="{{ asset('images/brand/logo-mark.svg') }}" alt="" width="37" height="38" class="absolute left-0 top-0 w-[37.23px] h-[37.51px]" />
    <img src="{{ asset('images/brand/logo-maison.svg') }}" alt="" width="62" height="11" class="absolute left-[45.02px] top-1 w-[62.18px] h-[10.56px]" />
    <img src="{{ asset('images/brand/logo-larecette.svg') }}" alt="" width="105" height="17" class="absolute left-11 top-[17.7px] w-[104.62px] h-[17.19px]" />
</a>
