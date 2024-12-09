@props(['class' => ''])

<main @class([
    '[&:not(:first-child)]:*:border-t [&:not(:first-child)]:*:border-black mt-28 flex-1',
    $class,
])>{{ $slot }}
</main>
