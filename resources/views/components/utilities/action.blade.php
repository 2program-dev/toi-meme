@props(['href' => '#', 'tag' => 'a', 'disabled' => false, 'border' => false, 'type' => 'primary', 'click' => ''])

<{{ $tag }} @if ($disabled) disabled @endif href="{{ $href }}"
    x-on:click="{{ $click }}" @class([
        ' rounded-full uppercase font-bold inline-grid place-items-center transition-colors duration-300 size-10',
        'border border-black' => $border,
        'text-cream bg-orange hover:bg-orange-500 disabled:bg-orange-300' =>
            $type == 'primary',
        ' bg-cream text-orange hover:bg-cream-200 disabled:bg-cream-50' =>
            $type == 'secondary',
    ])>
    {{ $slot }}
    </{{ $tag }}>
