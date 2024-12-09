@props(['hasSpace' => true, 'class' => ''])

<section @class(['py-16' => $hasSpace === true, $class])>
    {{ $slot }}
</section>
