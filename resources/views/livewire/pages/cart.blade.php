<x-utilities.main>
    <x-utilities.section>
        <x-utilities.container>
            <div class="mb-4">
                <p class="font-serif italic font-normal ~sm/lg:~text-1xl/3xl">Carrello</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_0.4fr] gap-4 items-start">
                <div class="flex flex-col gap-4">
                    <x-utilities.cart-item color="brown" image="/assets/products/bilanciata.png" title="Bilanciata"
                        subtitle="Bruciagrassi" price="30.00" quantity="5" />
                    <x-utilities.cart-item color="consider" image="/assets/products/depurata.png" title="Depurata"
                        subtitle="Bruciagrassi" price="30.00" quantity="1" />
                    <x-utilities.cart-item color="reinvigorated" image="/assets/products/rinvigorita.png"
                        title="Rinvigorita" subtitle="Bruciagrassi" price="30.00" quantity="3" />
                    <x-utilities.cart-item color="radiant" image="/assets/products/raggiante.png" title="Raggiante"
                        subtitle="Bruciagrassi" price="30.00" quantity="10" />
                </div>

                <div class="bg-cream-50 p-4 sticky top-20 flex flex-col gap-4">
                    <div class="flex items-center gap-1 justify-between">
                        <p>Subtotale:</p>
                        <p class="font-bold">€ 240.00</p>
                    </div>
                    <small class="text-sm block">Lorem ipsum...</small>

                    <x-utilities.button tag="button" color="brown">
                        Check-out
                    </x-utilities.button>
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>
</x-utilities.main>
