@props([
    'html' => '',
])

{{-- Rendu du contenu riche saisi dans Filament (RichEditor) --}}
<div {{ $attributes->merge(['class' => 'text-body-lg text-forest space-y-4 [&_h2]:text-title [&_h2]:font-bold [&_h3]:text-subtitle [&_h3]:font-bold [&_a]:text-sage [&_a]:underline [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:list-decimal [&_ol]:pl-6 [&_strong]:font-semibold [&_blockquote]:rounded-image [&_blockquote]:bg-sage [&_blockquote]:p-5 [&_blockquote]:text-subtitle [&_blockquote]:font-bold [&_blockquote]:text-white [&_img]:rounded-card']) }}>
    {!! $html !!}
</div>
