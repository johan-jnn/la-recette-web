<header class="{{ $useSticky ? 'sticky' : 'fixed' }} top-0 left-0 w-full px-8 py-4">
    <div class="flex justify-between items-center gap-8 p-2 rounded-sm bg-gray-300">
        <p>maison la recette</p>

        <nav>
            <ul class="flex gap-4">
                @foreach ($nav as $label => $url)
                    <li class="{{ $label == $here ? 'underline' : '' }} hover:underline">
                        <a href="{{ $url }}">{{ $label }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <nav>
            <ul>
                @foreach ($cta as $label => $url)
                    <li>
                        <x-ui.button :url="$url">{{ $label }}</x-ui.button>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
