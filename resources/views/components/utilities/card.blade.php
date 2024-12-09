@props([
    'href' => '#',
    'image' => '',
    'title' => 'Titolo',
    'subtitle' => 'Sottotitolo',
    'price' => '30.00',
    'color' => '',
])

<a href={{ $href }} class="grid grid-rows-subgrid row-span-2 gap-y-0 @container">
    <div @class([
        'grid place-items-center aspect-square @[550px]:aspect-video',
        'bg-brown' => $color === 'brown',
        'bg-consider' => $color === 'consider',
        'bg-reinvigorated' => $color === 'reinvigorated',
        'bg-radiant' => $color === 'radiant',
        'bg-energetic' => $color === 'energetic',
    ])>
        <img src="{{ asset($image) }}" class="size-full object-contain">
    </div>
    <div class="py-5 px-2 border-y text-center">
        <p class="font-bold">{{ $title }}</p>
        <p class="font-light">{{ $subtitle }}</p>
        <p class="font-light">€ {{ $price }}</p>
    </div>
</a>
