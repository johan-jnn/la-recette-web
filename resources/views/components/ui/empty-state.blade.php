@props([
    'message' => 'Aucun contenu pour le moment.',
])

<div {{ $attributes->merge(['class' => 'col-span-full p-10 rounded-2xl border border-dashed border-[#D6D6D6] text-center text-sm text-[#808080]']) }}>
    {{ $slot->isNotEmpty() ? $slot : $message }}
</div>
