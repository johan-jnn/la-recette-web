@props([
    'name',
    'label' => null,
    'for' => null,
    'required' => false,
    'tone' => 'light',
])

{{-- Conteneur commun à tous les champs : label, contrôle (slot) et message d'erreur --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-1.5 w-full']) }}>
    @if ($label)
        <x-forms.label :for="$for" :required="$required" :tone="$tone">{{ $label }}</x-forms.label>
    @endif

    {{ $slot }}

    <x-forms.error :name="$name" :tone="$tone" />
</div>
