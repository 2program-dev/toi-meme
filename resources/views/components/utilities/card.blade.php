@props([
    'color' => '',
    'product' => null
])

<a href="{{ route('product', ['slug' => $product->slug]) }}" class="grid grid-rows-subgrid row-span-2 gap-y-0 @container">
    <div @class([
        'grid place-items-center aspect-square size-full @[550px]:aspect-video',
        'bg-brown' => $color === 'brown',
        'bg-consider' => $color === 'consider',
        'bg-reinvigorated' => $color === 'reinvigorated',
        'bg-radiant' => $color === 'radiant',
        'bg-energetic' => $color === 'energetic',
        'bg-photo' => $color === 'default',
    ])>
        <img src="{{ Storage::url($product->image) }}" class="size-full object-contain aspect-square @[550px]:aspect-video">
    </div>
    <div class="py-5 px-2 border-y text-center">
        <p class="font-bold">{{ $product->title }}</p>
        <p class="font-light">{{ $product->subtitle }}</p>
        <p class="font-light">€ {{ $product->formatted_price }}</p>
    </div>
</a>
