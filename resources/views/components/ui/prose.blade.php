@props([
    'html' => '',
])

{{-- Rendu du contenu riche saisi dans Filament (RichEditor) --}}
<div {{ $attributes->merge(['class' => 'text-body-lg text-forest space-y-4 [&_h2]:text-title [&_h2]:font-bold [&_h3]:text-subtitle [&_h3]:font-bold [&_a]:text-sage [&_a]:underline [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:list-decimal [&_ol]:pl-6 [&_strong]:font-semibold [&_blockquote]:border-l-4 [&_blockquote]:border-sage [&_blockquote]:pl-4 [&_blockquote]:italic [&_img]:rounded-card']) }}>
    {!! $html !!}
</div>
