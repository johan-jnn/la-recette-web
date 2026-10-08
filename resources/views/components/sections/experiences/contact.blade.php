@props([
    'title' => 'Contactez-nous',
    'description' => 'Une question sur une expérience, une privatisation ou un moment pour votre équipe ? Écrivez-nous.',
])

{{-- Bloc contact vert clair avec formulaire compact et flèche décorative --}}
<section id="contact" class="relative w-full bg-sage px-4 py-16 md:py-[100px] scroll-mt-24">
    <div aria-hidden="true" class="pointer-events-none absolute left-[-193px] top-[-251px] hidden size-[572.5px] items-center justify-center md:flex">
        <img src="{{ asset('images/decor/arrow.svg') }}" alt="" width="393" height="417" class="max-w-none w-[393px] h-[416.73px] -rotate-[135deg]" />
    </div>

    <div class="relative mx-auto flex max-w-[1120px] flex-col items-center gap-[50px]">
        <div class="flex flex-col items-center gap-5 text-center text-forest">
            <h2 class="text-3xl md:text-quote font-medium">{{ $title }}</h2>
            <p class="text-base leading-6">{{ $description }}</p>
        </div>

        <div class="w-full rounded-card bg-forest p-6 md:p-[50px]">
            <x-forms.contact-form theme="dark" />
        </div>
    </div>
</section>
