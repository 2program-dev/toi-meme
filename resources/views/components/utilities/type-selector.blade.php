@props(['title' => '', 'image' => '', 'name' => 'product-selector', 'id' => ''])

<label class="relative cursor-pointer max-w-[100px] group" for={{ $id }}>
    <input class="absolute has-[:checked]:bg-black inset-0 [&:checked+*]:!bg-white [&:checked+*]:text-black opacity-0"
        type="radio" id={{ $id }} name={{ $name }} />
    <div
        class="transition-colors border border-black text-center flex flex-col items-center rounded-3xl pb-2 mt-4 group-hover:bg-white/50">
        <img src="{{ asset('/assets/' . $image) }}" width="110px" height="110px"
            class="-translate-y-4 aspect-square max-h-24 object-contain">
        <p class="font-light text-base">{{ $title }}</p>
    </div>
</label>
