@props(['size' => 'normal'])

<div @class([
    'mx-auto px-4 w-full',
    'max-w-[calc(1230px+2rem)]' => $size === 'normal',
    'max-w-[calc(858px+2rem)]' => $size === 'small',
    'max-w-[calc(420px+2rem)]' => $size === 'xsmall',
])>
    {{ $slot }}
</div>
