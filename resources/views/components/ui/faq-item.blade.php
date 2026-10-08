@props([
    'question',
    'answer',
    'open' => false,
])

{{-- Item de FAQ (composants Figma "Input Défault" / "Input Accordéon") --}}
<details @if ($open) open @endif class="group w-full rounded-field border border-line bg-white p-5">
    <summary class="flex items-center justify-between gap-4 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
        <span class="text-question font-semibold text-ink">{{ $question }}</span>
        <img
            src="{{ asset('images/icons/chevron-down.svg') }}"
            alt=""
            aria-hidden="true"
            width="20"
            height="20"
            class="size-5 shrink-0 transition-transform duration-200 group-open:rotate-180"
        />
    </summary>
    <p class="mt-3 text-base leading-[1.55] text-forest">
        {{ $answer }}
    </p>
</details>
