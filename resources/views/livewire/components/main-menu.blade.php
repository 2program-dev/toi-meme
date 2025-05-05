<ul class="{{ $menuClass }}">
    <li class="font-light">
        <a class="underline-offset-8" href="{{ route('products') }}"
           :class="{ 'underline': window.location.pathname == '/products' }">Prodotti</a>
    </li>
    <li class="font-light">
        <a class="underline-offset-8" href="{{ route('about') }}"
           :class="{ 'underline': window.location.pathname == '/about' }">Chi siamo</a>
    </li>
    <li class="font-light">
        <a class="underline-offset-8" href="{{ route('contacts') }}"
           :class="{ 'underline': window.location.pathname == '/contacts' }">Contatti</a>
    </li>
</ul>
