@props([
    'name',
    'tone' => 'light',
])

@error($name)
    <p {{ $attributes->merge(['class' => 'text-xs font-medium ' . ($tone === 'dark' ? 'text-rose' : 'text-red-600')]) }}>{{ $message }}</p>
@enderror
