@props([
    'question',
    'answer',
    'open' => false,
])

<details {{ $open ? 'open' : '' }} class="group border-b border-[#E5E5E5] py-4 transition-colors">
    <summary class="flex justify-between items-center cursor-pointer list-none font-semibold text-base text-[#171717] hover:text-black">
        <span>{{ $question }}</span>
        <span class="text-xl transition-transform duration-200 group-open:rotate-45 font-light text-[#808080]">
            +
        </span>
    </summary>
    <div class="mt-3 text-sm text-[#626262] leading-relaxed pr-8">
        {{ $answer }}
    </div>
</details>
