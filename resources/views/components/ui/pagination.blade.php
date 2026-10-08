@props([
    'paginator', // Illuminate\Contracts\Pagination\LengthAwarePaginator
])

{{-- Pagination en boutons "pilule" : Précédent, numéros de page, Suivant --}}
@if ($paginator->hasPages())
    <nav aria-label="Pagination" {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-center gap-4']) }}>
        @if ($paginator->onFirstPage())
            <span class="btn btn-neutral opacity-50 cursor-not-allowed">Précédent</span>
        @else
            <x-ui.button :url="$paginator->previousPageUrl()" variant="neutral" rel="prev">Précédent</x-ui.button>
        @endif

        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page === $paginator->currentPage())
                <span class="btn btn-sage" aria-current="page">{{ $page }}</span>
            @else
                <x-ui.button :url="$url" variant="neutral">{{ $page }}</x-ui.button>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <x-ui.button :url="$paginator->nextPageUrl()" variant="neutral" rel="next">Suivant</x-ui.button>
        @else
            <span class="btn btn-neutral opacity-50 cursor-not-allowed">Suivant</span>
        @endif
    </nav>
@endif
