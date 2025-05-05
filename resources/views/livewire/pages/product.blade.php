<x-utilities.main>
    {{-- Product description --}}
    <x-utilities.section hasSpace={{ false }}>
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-cream">
            {{-- Product image --}}
            <div class="relative bg-photo">
                <img src="{{ $product->image }}" class="size-full object-contain">
            </div>

            {{-- Product description --}}
            <div class="py-9 px-4 lg:px-12">
                <div class="lg:max-w-[564px]">
                    {{-- Title and subtitle --}}
                    <div class="mb-8 space-y-3">
                        <h1 class="~sm/lg:~text-1xl/2xl font-serif italic font-normal">
                            {{ $product->title }}
                        </h1>
                        <p>{{ $product->category }}</p>
                        <p>€ {{ $product->formatted_price }} - quantità minima {{ $product->variants[0]->from_qty }}pz</p>
                    </div>

                    <hr class="my-3" />

                    {{-- Type selector --}}
{{--                    <div class="space-y-4">--}}
{{--                        <p>Type</p>--}}
{{--                        <div class="flex flex-wrap items-center gap-6">--}}
{{--                            --}}{{-- Selector - Bustine --}}
{{--                            <x-utilities.type-selector image="/type-selector-bustine.png" title="Bustine"--}}
{{--                                id="type-bustine" name="product-selector" />--}}

{{--                            <x-utilities.type-selector image="/type-selector-pillole.png" title="Pillole"--}}
{{--                                id="type-pillole" name="product-selector" />--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <div class="flex flex-wrap lg:flex-row items-center gap-4 mt-12">
                        @if(auth()->check())
                            @if(auth()->user()->approved)
                                {{-- Select options --}}
{{--                                <div--}}
{{--                                    class="grid grid-cols-1 overflow-hidden grid-rows-1 items-center gap-2 border border-black rounded-full min-w-[154px] h-[52px] after:block after:row-span-full after:col-span-full after:w-[17px] after:h-[10px] after:pointer-events-none after:justify-self-end after:mr-4 after:bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNyIgaGVpZ2h0PSIxMCIgZmlsbD0ibm9uZSI+PHBhdGggc3Ryb2tlPSIjMDAwIiBkPSJNMTYgMSA4LjY4MyA5IDEgMSIvPjwvc3ZnPg==')]">--}}
{{--                                    <select--}}
{{--                                        class="cursor-pointer appearance-none bg-transparent px-5 py-3 pr-9 size-full leading-none row-span-full col-span-full">--}}
{{--                                        <option value="100">100</option>--}}
{{--                                        <option value="200">200</option>--}}
{{--                                        <option value="300">300</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                {{-- Select options --}}
                                <form wire:submit.prevent="addToCart" class="flex flex-wrap lg:flex-row items-center gap-4">
                                    <div class="grid grid-cols-1 overflow-hidden grid-rows-1 items-center gap-2 border border-black rounded-full h-[52px] after:block after:row-span-full after:col-span-full after:pointer-events-none after:justify-self-end after:mr-4">
                                        <input type="number" wire:model.defer="quantity" value="{{ $quantity }}" min="{{ $product->variants[0]->from_qty }}" class="cursor-pointer appearance-none outline-none bg-transparent px-5 py-3 pr-9 size-full leading-none row-span-full col-span-full" />
                                    </div>

                                    <div class="lg:min-w-[375px] *:w-full">
                                        <x-utilities.button tag="button">Aggiungi al carrello</x-utilities.button>
                                    </div>
                                </form>
                            @else
                                <p class="text-[#FF0000]">Devi essere approvato per poter acquistare i prodotti</p>
                            @endif
                        @else
                            <div class="lg:min-w-[375px] *:w-full">
                                <a href="/login">
                                    <x-utilities.button tag="button">Accedi per acquistare</x-utilities.button>
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- Descrizione --}}
                    <div class="mt-8">
                        <div x-data="{ tab: 'tab1', expanded: false }">
                            <div class="flex flex-wrap items-center gap-x-8 gap-y-4">
                                <button :class="{ 'underline underline-offset-8 !decoration-black': tab == 'tab1' }"
                                    @click.prevent="tab = 'tab1'"
                                    class="uppercase decoration-transparent transition-colors duration-500">Descrizione</button>

                                <button :class="{ 'underline underline-offset-8 !decoration-black': tab == 'tab2' }"
                                    @click.prevent="tab = 'tab2'"
                                    class="uppercase decoration-transparent transition-colors duration-500">Ingredienti</button>
                            </div>

                            <div class="mt-4 grid grid-cols-1 *:col-span-full *:row-span-full">
                                <div x-show="tab == 'tab1'" x-transition.opacity x-transition.duration.300ms>
                                    <p x-show="expanded" x-collapse.min.156px>
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div x-show="tab == 'tab2'" x-transition.opacity x-transition.duration.300ms>
                                    <p x-show="expanded" x-collapse.min.156px>
                                        {{ $product->ingredients }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button @click="expanded=!expanded" x-text="expanded ? 'Close' : 'Read more'"
                                    class="uppercase text-base"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-utilities.section>

    {{-- Text image - Focus ingredienti --}}
    @if($product->focus_description != "" && $product->focus_title != "" && $product->focus_image != "")
        <x-utilities.section>
            <x-utilities.container>
                <div class="flex flex-col-reverse md:flex-row md:items-center gap-x-20 gap-y-4">
                    <div class="basis-1/2">
                        <div class="md:max-w-[379px] ~sm/lg:~mb-4/6">
                            <h4 class="~sm/lg:~text-1xl/3xl">
                                {{ $product->focus_title }}
                            </h4>
                        </div>
                        <div class="md:max-w-[446px]">
                            <p>
                                {{ $product->focus_description }}
                            </p>
                        </div>
                    </div>
                    <div class="basis-1/2">
                        <img src="{{ $product->focus_image }}" class="object-cover size-full">
                    </div>
                </div>
            </x-utilities.container>
        </x-utilities.section>
    @endif

    {{-- Prodotti correlati --}}
    @if(count($product->related_products) == 2)
        <x-utilities.section>
            <x-utilities.container>
                <div class="text-center mb-8">
                    <p class="uppercase underline underline-offset-8">Prodotti</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-11">
                    @foreach($product->related_product_objects as $related_product)
                        <x-utilities.card color="default" :product="$related_product" />
                    @endforeach
                </div>
            </x-utilities.container>
        </x-utilities.section>
    @endif;
</x-utilities.main>
