<main class="[&:not(:first-child)]:*:border-t [&:not(:first-child)]:*:border-black">
    {{-- Hero --}}
    <div class="max-h-[800px] h-full">
        <img src="{{ asset('/assets/hero-homepage-prodotti.jpg') }}" class="h-auto object-cover">
    </div>

    {{-- Image in text --}}
    <section class="py-16">
        <div class="max-w-[1230px] mx-auto px-4">
            <p>Facciamo un patto. <img src="{{ asset('/assets/image-in-text-1.jpg') }}" width="157px" height="auto"
                    class="h-auto inline-block">
                Noi ci impegniamo a dirti la verità.<br /> Tu impegnati <img
                    src="{{ asset('/assets/image-in-text-2.jpg') }}" width="157px" height="auto"
                    class="h-auto inline-block"> a stare bene.
            </p>
        </div>
    </section>

    {{-- La nostra filosofia --}}
    <section>
        <div class="bg-consider text-center flex flex-col items-center gap-4 py-9">
            <p>La nostra filosofia</p>
            <a href="#" class="text-white bg-orange rounded-full uppercase font-bold py-2 px-7">Scopri di più</a>
        </div>
    </section>

    {{-- Lista prodotti --}}
    <section class="py-16">
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-11">
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

                {{-- Card 3 - Rinvigorita --}}
                <div class="grid grid-rows-subgrid row-span-2 gap-y-0">
                    <div class="grid place-items-center bg-reinvigorated aspect-square">
                        <img src="{{ asset('/assets/products/rinvigorita.png') }}" class="size-full object-cover">
                    </div>
                    <div class="py-5 px-2 border-y grid place-items-center">
                        <div class="text-center">
                            <p class="font-bold">Rinvigorita</p>
                            <p class="font-light">Bruciagrassi</p>
                            <p class="font-light">€ 30.00</p>
                        </div>
                    </div>
                </div>

                {{-- Box full --}}
                <div
                    class="p-6 bg-radiant text-white col-span-full grid items-center grid-cols-[3fr_2fr] min-h-[421px]">
                    <p>Quando parleremo di integratori ti diremo...</p>
                    <div class="relative mt-4 mr-10 self-stretch">
                        <img src="{{ asset('/assets/products.jpg') }}"
                            class="absolute inset-0 size-full object-cover object-top">
                    </div>
                </div>

                {{-- Card 4 - Raggiante --}}
                <div class="grid grid-rows-subgrid row-span-2 gap-y-0">
                    <div class="grid place-items-center bg-radiant aspect-square">
                        <img src="{{ asset('/assets/products/raggiante.png') }}" class="size-full object-cover">
                    </div>
                    <div class="py-5 px-2 border-y grid place-items-center" class="size-full object-cover">
                        <div class="text-center">
                            <p class="font-bold">Raggiante</p>
                            <p class="font-light">Bruciagrassi</p>
                            <p class="font-light">€ 30.00</p>
                        </div>
                    </div>
                </div>

                {{-- Box - Banner --}}
                <div class="grid row-span-2 bg-grey">
                    <div class="py-5 px-2 grid place-items-center">
                        <div class="text-center">
                            <p>Se non sei una P.IVA contattaci per avere informazioni sui prodotti</p>
                            <a href="#"
                                class="text-white bg-orange rounded-full uppercase font-bold py-2 px-7 border border-black">Lascia
                                la
                                mail</a>
                        </div>
                    </div>
                </div>

                {{-- Card 3 - Energica --}}
                <div class="grid grid-rows-subgrid row-span-2 gap-y-0">
                    <div class="grid place-items-center bg-energetic aspect-square">
                        <img src="{{ asset('/assets/products/energetica.png') }}" class="size-full object-cover">
                    </div>
                    <div class="py-5 px-2 border-y grid place-items-center">
                        <div class="text-center">
                            <p class="font-bold">Rinvigorita</p>
                            <p class="font-light">Bruciagrassi</p>
                            <p class="font-light">€ 30.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Box - Focus ingredienti --}}
    <section class="py-14 bg-orange text-white">
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="grid items-center grid-cols-2 gap-x-20">
                <img src="{{ asset('/assets/focus-ingredienti.jpg') }}" class="object-cover size-full">


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
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-14">
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="text-center">
                <p class="mb-6">Vuoi saperne di più<br /> sui nostri prodotti.</p>
                <a href="#" class="text-white bg-orange rounded-full uppercase font-bold py-2 px-7">Contattaci</a>
            </div>
        </div>
    </section>
</main>
