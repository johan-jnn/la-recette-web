<div class="max-w-sm bg-neutral-primary-soft border border-default rounded-lg shadow-xs overflow-hidden">
    <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        <div class="py-5 pl-5 pr-8">
        <p class="mb-2 text-sm text-body truncate">
            Catégorie
        </p>     
        <h5 class="mb-2 text-xl font-bold tracking-tight text-heading line-clamp-2 wrap-break-word">
            {{ $experience->title }}
        </h5>     
        <p class="mb-4 text-body line-clamp-3 wrap-break-word">
            {{ $experience->presentation }}
        </p>
        <a href="#" class="font-medium hover:text-green-800 hover:underline transition-colors underline inline-block">
            Découvrir ->
        </a>
    </div>
</div>