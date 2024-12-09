@props(['href' => '#', 'size' => 'md', 'border' => false])

<a href="{{ $href }}" @class([
    'text-cream bg-orange rounded-full uppercase font-bold inline-grid place-items-center',
    '~sm/lg:~text-xl/1xl lg:min-w-[19.5rem] min-h-[4rem] lg:min-h-[4.75rem] px-7' =>
        $size == 'lg',
    '~sm/lg:~text-base/lg px-7 min-h-[3.25rem]' => $size == 'md',
    'text-sm min-h-[38px] px-4' => $size == 'sm',
    'border border-black' => $border,
])>
    {{ $slot }}
</a>
