<ul class="{{ $menuClass }}">
    <li class="font-light">
        <a class="underline-offset-8" href="{{ route('product') }}"
           :class="{ 'underline': window.location.pathname == '/product' }">Prodotti</a>
    </li>
    <li class="font-light">
        <a class="underline-offset-8" href="{{ route('about') }}"
           :class="{ 'underline': window.location.pathname == '/about' }">Chi siamo</a>
    </li>
    <li class="font-light">
        <a class="underline-offset-8" href="{{ route('contacts') }}"
           :class="{ 'underline': window.location.pathname == '/contacts' }">Contatti</a>
    </li>
    @if(Auth::check())
        <li class="font-light">
            <button wire:click="logout">Logout</button>
        </li>
    @endif
</ul>
