@props([
    'title' => 'Nous contacter',
    'subtitle' => 'Une question, un devis ou une proposition ?',
])

<section id="contact" class="w-full py-20 px-6 md:px-16 bg-[#F9F9FB] border-t border-[#E5E5E5]">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-semibold text-[#171717] tracking-tight mb-3">
                {{ $title }}
            </h2>
            <p class="text-base text-[#626262]">
                {{ $subtitle }}
            </p>
        </div>

        <div class="p-8 md:p-10 rounded-3xl bg-white border border-[#E5E5E5] shadow-sm">
            <x-forms.contact-form />
        </div>
    </div>
</section>
