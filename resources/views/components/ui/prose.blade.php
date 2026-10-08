@props([
    'html' => '',
])

{{-- Rendu du contenu riche saisi dans Filament (RichEditor) --}}
<div {{ $attributes->merge(['class' => 'text-[#626262] leading-relaxed space-y-4 [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#171717] [&_h3]:text-xl [&_h3]:font-semibold [&_h3]:text-[#171717] [&_a]:text-[#1C4937] [&_a]:underline [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:list-decimal [&_ol]:pl-6 [&_strong]:text-[#171717] [&_blockquote]:border-l-4 [&_blockquote]:border-[#E5E5E5] [&_blockquote]:pl-4 [&_blockquote]:italic [&_img]:rounded-2xl']) }}>
    {!! $html !!}
</div>
