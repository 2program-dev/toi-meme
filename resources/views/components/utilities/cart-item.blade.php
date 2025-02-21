@props([
    'href' => '#',
    'image' => '',
    'title' => 'Titolo',
    'subtitle' => 'Sottotitolo',
    'price' => '30.00',
    'priceTotal' => '60.00',
    'quantity' => 1,
    'color' => '',
])

<div class="flex flex-wrap items-stretch ">
    <div @class([
        'grid place-items-center aspect-square size-full flex-grow-0 flex-shrink-0 md:basis-[160px]',
        'bg-brown' => $color === 'brown',
        'bg-consider' => $color === 'consider',
        'bg-reinvigorated' => $color === 'reinvigorated',
        'bg-radiant' => $color === 'radiant',
        'bg-energetic' => $color === 'energetic',
    ])>
        <img src="{{ asset($image) }}" class="size-full object-contain aspect-square">
    </div>
    <div class="flex flex-auto border-y p-5 ">
        <div class="flex w-full gap-4 flex-wrap items-center">
            <div class="flex-1">
                <a href={{ $href }} class="font-bold hover:underline">{{ $title }}</a>
                <p class="font-light">{{ $subtitle }}</p>
                <p class="font-light">€ {{ $price }}</p>
                <p class="font-light text-sm">Quantità: <b>{{ $quantity }}</b></p>
            </div>

            <div class="flex items-center gap-4">
                <p class="font-light">Totale:<br /> € {{ $priceTotal }}</p>
                <x-utilities.button tag="button" color="brown">
                    <x-icons.delete-line />
                </x-utilities.button>
            </div>
        </div>
    </div>
</div>
