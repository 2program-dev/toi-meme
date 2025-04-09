@props(['href' => '#', 'size' => 'md', 'tag' => 'a', 'disabled' => false, 'border' => false, 'type' => 'primary', 'click' => '', 'confirm' => ''])

<{{ $tag }} @if ($disabled) disabled @endif href="{{ $href }}" @if($click) wire:click="{{ $click }}" @endif @if($confirm) wire:confirm="{{ $confirm }}" @endif
    @class([
        ' rounded-full uppercase font-bold inline-grid place-items-center transition-colors duration-300',
        '~sm/lg:~text-xl/1xl lg:min-w-[19.5rem] min-h-[4rem] lg:min-h-[4.75rem] px-7' =>
            $size == 'lg',
        '~sm/lg:~text-base/lg px-7 min-h-[3.25rem]' => $size == 'md',
        'text-sm min-h-[38px] px-4' => $size == 'sm',
        'border border-black' => $border,
        'text-cream bg-orange hover:bg-orange-500 disabled:bg-orange-300' =>
            $type == 'primary',
        ' bg-cream text-orange hover:bg-cream-200 disabled:bg-cream-50' =>
            $type == 'secondary',
    ])>
    {{ $slot }}
    </{{ $tag }}>
