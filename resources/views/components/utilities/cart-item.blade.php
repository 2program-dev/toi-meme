@props([
    'cartItem' => null,
    'color' => '',
])

<div class="flex flex-wrap flex-col md:flex-row">
    <div @class([
        'grid place-items-center aspect-square size-full flex-grow-0 flex-shrink-0 md:basis-[160px]',
        'bg-brown' => $color === 'brown',
        'bg-consider' => $color === 'consider',
        'bg-reinvigorated' => $color === 'reinvigorated',
        'bg-radiant' => $color === 'radiant',
        'bg-energetic' => $color === 'energetic',
        'bg-photo' => $color === 'default',
    ])>
        <img src="{{ $cartItem->product->image }}" class="size-full object-contain aspect-square">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-y p-5 max-md:px-0 flex-1 items-center justify-between">
        <div>
            <a href="{{ route('product', ['slug' => $cartItem->product->slug]) }}" class="font-bold hover:underline">{{ $cartItem->product->title }}</a>
            <p class="font-light">{{ $cartItem->product->category }}</p>
            <p class="font-light">€ {{ $cartItem->price_formatted }}</p>
        </div>

        <div class="flex flex-col gap-2 md:ml-auto">
            <div class="flex items-center gap-4">
                <p class="font-light">Totale:<br /> € <b>{{ $cartItem->subtotal_formatted }}</b></p>
            </div>

            <div class="flex items-center gap-4">
                <x-utilities.action type='secondary' tag="button"  color="brown" xclick="if(confirm('Sei sicuro di voler rimuovere questo prodotto dal carrello?')) { $wire.removeFromCart({{ $cartItem->id }}) }">
                    <x-icons.delete-line />
                </x-utilities.action>

                <x-utilities.action type='secondary' tag="button" disabled="{{ $cartItem->quantity == $cartItem->product->variants->first()->from_qty }}" color="brown" click="decreaseQuantity({{ $cartItem->id }})">
                    <x-icons.subtract-line />
                </x-utilities.action>

                <span class="font-bold min-w-[30px] text-center">{{ $cartItem->quantity }}</span>

                <x-utilities.action tag="button" color="brown" click="increaseQuantity({{ $cartItem->id }})">
                    <x-icons.add-line />
                </x-utilities.action>
            </div>
        </div>
    </div>
</div>
