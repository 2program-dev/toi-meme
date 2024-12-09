@props(['size' => 'normal'])

<div @class([
    'mx-auto px-4',
    'max-w-[calc(1230px+2rem)]' => $size === 'normal',
    'max-w-[calc(858px+2rem)]' => $size === 'small',
])>
    {{ $slot }}
</div>
