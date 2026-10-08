@props([
    'name',
])

@error($name)
    <p {{ $attributes->merge(['class' => 'text-xs text-red-600 font-medium']) }}>{{ $message }}</p>
@enderror
