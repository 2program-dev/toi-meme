@props(['hasSpace' => true, 'class' => ''])

<section class="{{ $hasSpace === true ? 'py-16' : '' }} {{ $class }}">
    {{ $slot }}
</section>
