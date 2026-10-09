@props([
    'paginator', // Illuminate\Contracts\Pagination\LengthAwarePaginator
    'nextVariant' => 'forest', // variante du bouton "Suivant" : forest, rose
])

@php
    $nextClass = $nextVariant === 'rose' ? 'btn-rose' : 'btn-forest';
@endphp

{{-- Pagination : Précédent (crème), numéros de page, Suivant (couleur selon la page) --}}
@if ($paginator->hasPages())
    <nav aria-label="Pagination" {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-center gap-4 md:gap-[47px]']) }}>
        @if ($paginator->onFirstPage())
            <span class="btn btn-cream opacity-50 cursor-not-allowed">Précédent</span>
        @else
            <x-ui.button :url="$paginator->previousPageUrl()" variant="cream" rel="prev">Précédent</x-ui.button>
        @endif

        <div class="flex items-center gap-4">
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page === $paginator->currentPage())
                    <span class="flex h-[41px] min-w-12 items-center justify-center rounded-pill bg-forest px-3 text-sm font-semibold text-white" aria-current="page">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="flex h-[41px] min-w-6 items-center justify-center text-sm font-semibold text-forest hover:text-sage">{{ $page }}</a>
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn {{ $nextClass }}">Suivant</a>
        @else
            <span class="btn {{ $nextClass }} opacity-50 cursor-not-allowed">Suivant</span>
        @endif
    </nav>
@endif
