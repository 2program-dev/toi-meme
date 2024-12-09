<x-utilities.main>
    {{-- Product description --}}
    <x-utilities.section hasSpace={{ false }}>
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-cream min-h-[calc(100vh-112px)]">
            {{-- Product image --}}
            <div class="relative">
                <img src="{{ asset('/assets/product.jpg') }}" class="size-full object-cover">
            </div>

            {{-- Product description --}}
            <div class="py-9 px-12">
                <div class="max-w-[564px]">
                    {{-- Title and subtitle --}}
                    <div class="mb-8 space-y-3">
                        <h1 class="~sm/lg:~text-xl/2xl font-serif italic font-normal">Depurata</h1>
                        <p>Drenante</p>
                        <p>€ 30,00 - quantità minima 200pz</p>
                    </div>

                    <hr class="my-3" />

                    {{-- Type selector --}}
                    <div class="space-y-4">
                        <p>Type</p>
                        <div class="flex flex-wrap items-center gap-6">
                            {{-- Selector - Bustine --}}
                            <x-utilities.type-selector image="/type-selector-bustine.png" title="Bustine"
                                id="type-bustine" name="product-selector" />

                            <x-utilities.type-selector image="/type-selector-pillole.png" title="Pillole"
                                id="type-pillole" name="product-selector" />
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row items-center gap-4 mt-12">
                        {{-- Select options --}}
                        <div
                            class="relative gap-2 border border-black rounded-full min-w-[154px] h-[52px] grid-cols-1 items-center after:w-4 after:h-2 after:block after:bg-black">
                            <select class="appearance-none bg-transparent px-5 py-3 size-full">
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                            {{-- <x-icons.arrow-bottom-line width="16" height="16" /> --}}
                        </div>
                        {{-- Select options --}}


                        <button class="text-white uppercase bg-orange rounded-full font-bold py-2 px-7">Aggiungi al
                            carrello</button>
                    </div>

                    {{-- Descrizione --}}
                    <div class="mt-8">
                        <div x-data="{ tab: 'tab1' }">
                            <div class="flex items-center flex-wrap gap-x-8 gap-y-4">
                                <button :class="{ 'underline underline-offset-8 !decoration-black': tab == 'tab1' }"
                                    @click.prevent="tab = 'tab1'"
                                    class="uppercase decoration-transparent transition-colors duration-500">Descrizione</button>

                                <button :class="{ 'underline underline-offset-8 !decoration-black': tab == 'tab2' }"
                                    @click.prevent="tab = 'tab2'"
                                    class="uppercase decoration-transparent transition-colors duration-500">Ingredienti</button>
                            </div>

                            <div class="mt-4 grid grid-cols-1 *:col-span-full *:row-span-full">
                                <div x-show="tab == 'tab1'" x-transition.opacity x-transition.duration.300ms>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's, Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem Ipsum has been the industry's,
                                        Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry....
                                    </p>
                                </div>
                                <div x-show="tab == 'tab2'" x-transition.opacity x-transition.duration.300ms>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's, Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. Lorem Ipsum has been the industry's, Lorem Ipsum is
                                        simply dummy text of the printing and typesetting industry....
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button class="uppercase text-base">Read more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-utilities.section>

    {{-- Text image - Focus ingredienti --}}
    <x-utilities.section>
        <x-utilities.container>
            <div class="flex flex-col-reverse md:flex-row md:items-center gap-x-20 gap-y-4">
                <div class="basis-1/2">
                    <div class="md:max-w-[379px] ~sm/lg:~mb-4/6">
                        <h4 class="~sm/lg:~text-1xl/3xl">Focus ingredienti</h4>
                    </div>
                    <div class="md:max-w-[446px]">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. </p>
                    </div>
                </div>
                <div class="basis-1/2">
                    <img src="{{ asset('/assets/focus-ingredienti.jpg') }}" class="object-cover size-full">
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>

    {{-- Prodotti correlati --}}
    <x-utilities.section>
        <x-utilities.container>
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
        </x-utilities.container>
    </x-utilities.section>
</x-utilities.main>
