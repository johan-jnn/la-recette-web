@props([
    'tone' => 'white', // white, muted
])

{{-- Carte générique : bordure, arrondi et ombre au survol --}}
<article {{ $attributes->merge(['class' => 'rounded-3xl border border-[#E5E5E5] overflow-hidden flex flex-col hover:shadow-md transition-shadow group ' . ($tone === 'muted' ? 'bg-[#F9F9FB]' : 'bg-white')]) }}>
    {{ $slot }}
</article>
