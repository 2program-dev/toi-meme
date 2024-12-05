<main class="[&:not(:first-child)]:*:border-t [&:not(:first-child)]:*:border-black">
    {{-- Product description --}}
    <x-items.section hasSpace={{ false }}>
        <div class="grid grid-cols-2 bg-cream">
            {{-- Product image --}}
            <div class="aspect-square"></div>

            {{-- Product description --}}
            <div class="py-9 px-14">
                <div class="max-w-[564px]">
                    {{-- Title and subtitle --}}
                    <div class="border-b border-black pb-9">
                        <h1>Depurata</h1>
                        <p>Drenante</p>
                        <p>€ 30,00 - quantità minima 200pz</p>
                    </div>

                    {{-- Type selector --}}
                    <div>
                        <p class="mb-4">Type</p>
                        <div class="flex items-center gap-6">
                            {{-- Selector - Bustine --}}
                            <x-items.type-selector image="/type-selector-bustine.png" title="Bustine" id="type-bustine"
                                name="product-selector" />

                            <x-items.type-selector image="/type-selector-pillole.png" title="Pillole" id="type-pillole"
                                name="product-selector" />
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row items-center gap-4 mt-12">
                        <div
                            class="relative flex items-center justify-between gap-2 border border-black rounded-full p-2 min-w-[154px] px-5 py-3">

                            <select class="appearance-none bg-transparent">
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>

                            <x-icons.arrow-bottom-line width="16" height="16" />
                        </div>


                        <button class="text-white uppercase bg-orange rounded-full font-bold py-2 px-7">Aggiungi al
                            carrello</button>
                    </div>

                    <div class="">

                    </div>
                </div>
            </div>
        </div>
    </x-items.section>

    {{-- Box - Focus ingredienti --}}
    <x-items.section>
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="grid items-center grid-cols-2 gap-x-20">
                <div class="">
                    <h4 class="mb-6">Focus ingredienti di alta qualità</h4>
                    <div class="max-w-[446px]">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer
                            took a
                            galley of type and scrambled it to make a type specimen book. </p>
                    </div>
                </div>

                <img src="{{ asset('/assets/focus-ingredienti.jpg') }}" class="object-cover size-full">
            </div>
        </div>
    </x-items.section>

    {{-- Prodotti correlati --}}
    <x-items.section>
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="text-center mb-8">
                <p class="uppercase underline underline-offset-8">Prodotti</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-11">
                {{-- Card 1 - Bilanciata --}}
                <div class="grid grid-rows-subgrid row-span-2 gap-y-0">
                    <div class="grid place-items-center bg-brown aspect-square">
                        <img src="{{ asset('/assets/products/bilanciata.png') }}" class="size-full object-cover">
                    </div>
                    <div class="py-5 px-2 border-y grid place-items-center">
                        <div class="text-center">
                            <p class="font-bold">Bilanciata</p>
                            <p class="font-light">Bruciagrassi</p>
                            <p class="font-light">€ 30.00</p>
                        </div>
                    </div>
                </div>

                {{-- Card 2 - Depurata --}}
                <div class="grid grid-rows-subgrid row-span-2 gap-y-0">
                    <div class="grid place-items-center bg-consider aspect-square">
                        <img src="{{ asset('/assets/products/depurata.png') }}" class="size-full object-cover">
                    </div>
                    <div class="py-5 px-2 border-y grid place-items-center">
                        <div class="text-center">
                            <p class="font-bold">Depurata</p>
                            <p class="font-light">Bruciagrassi</p>
                            <p class="font-light">€ 30.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-items.section>
</main>
