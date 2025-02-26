@props([
    'href' => '#',
    'image' => '',
    'title' => 'Titolo',
    'subtitle' => 'Sottotitolo',
    'price' => '30.00',
    'quantity' => 1,
    'color' => '',
])

<template x-if="count > 0" x-data="{ price: {{ $price }}, count: {{ $quantity }} }">
    <div class="flex flex-wrap flex-col md:flex-row">
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-y p-5 max-md:px-0 flex-1 items-center justify-between">
            <div>
                <a href={{ $href }} class="font-bold hover:underline">{{ $title }}</a>
                <p class="font-light">{{ $subtitle }}</p>
                <p class="font-light">€ {{ $price }}</p>
            </div>

            <div class="flex flex-col gap-2 md:ml-auto">
                <div class="flex items-center gap-4">
                    <p class="font-light">Totale:<br /> € <b x-text="count * price"></b></p>
                </div>

                <div class="flex items-center gap-4">
                    <template x-if="count === 1">
                        <x-utilities.action type='secondary' click="count--" tag="button" color="brown">
                            <x-icons.delete-line />
                        </x-utilities.action>
                    </template>

                    <template x-if="count > 1">
                        <x-utilities.action type='secondary' click="count--" tag="button" color="brown">
                            <x-icons.subtract-line />
                        </x-utilities.action>
                    </template>

                    <span class="font-bold min-w-[30px] text-center" x-text="count"></span>

                    <x-utilities.action click="count++" tag="button" color="brown">
                        <x-icons.add-line />
                    </x-utilities.action>
                </div>
            </div>
        </div>
    </div>
</template>
