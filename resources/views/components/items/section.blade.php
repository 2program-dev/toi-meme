@props(['hasSpace' => true])

<section class="{{ $hasSpace === true ? 'py-16' : '' }}">
    {{ $slot }}
</section>
