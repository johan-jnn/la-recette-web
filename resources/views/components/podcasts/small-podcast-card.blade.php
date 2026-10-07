<div class="flex flex-col items-center bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs md:flex-row md:items-start md:max-w-xl rounded-lg">    
    <img class="object-cover w-full rounded-base h-64 md:h-auto md:w-48 mb-4 md:mb-0 rounded-lg" 
    src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" >
    <div class="flex flex-col justify-between md:px-4 md:pb-4 leading-normal min-w-0">
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading wrap-break-word">    
            {{$podcast->title}}
        </h5>
        <p class="mb-6 text-body wrap-break-word">
            {{$podcast->description}}  
        </p>
        <div>
            <a href="#" class="hover:text-green-800 hover:underline font-medium transition-colors underline">
                Écouter l'épisode ->
            </a>
        </div>
    </div>
</div>