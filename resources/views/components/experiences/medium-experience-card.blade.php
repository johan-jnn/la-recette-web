<div class="max-w-sm bg-neutral-primary-soft border border-default rounded-lg shadow-xs overflow-hidden">
    <img class="w-full h-48 object-cover" src="{{ $experience->thumbnail_url }}">
        <div class="py-5 pl-5 pr-8">   
        <h5 class="mb-2 text-xl font-bold tracking-tight text-heading line-clamp-2 wrap-break-word">
            {{ $experience->title }}
        </h5>     
        <p class="mb-4 text-body line-clamp-3 wrap-break-word">
            {!! $experience->presentation !!}
        </p>
        <a href="#" class="font-medium hover:text-green-800 hover:underline transition-colors underline inline-block">
            Découvrir ->
        </a>
    </div>
</div>