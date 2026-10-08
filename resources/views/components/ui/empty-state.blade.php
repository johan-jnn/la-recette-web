@props([
    'message' => 'Aucun contenu pour le moment.',
])

<div {{ $attributes->merge(['class' => 'col-span-full w-full p-10 rounded-card border border-dashed border-line text-center text-base text-muted']) }}>
    {{ $slot->isNotEmpty() ? $slot : $message }}
</div>
