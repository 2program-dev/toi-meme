<x-utilities.main>
    <x-utilities.section>
        <x-utilities.container>
            <div class="mb-4">
                <p class="font-serif italic font-normal ~sm/lg:~text-1xl/3xl">Lista ordini</p>
            </div>


            <div class="flex flex-col gap-4">
                <div x-data="{ expanded: false }">

                    <button @click="expanded = ! expanded"
                        class="w-full text-left bg-cream-50 p-4 flex items-center gap-4 justify-between fle-wrap cursor-pointer">
                        <div>
                            <p class="italic">Ordine n. <span class="font-bold">1</span></p>
                            <p class="italic text-md">Effettuato il <span class="font-bold">21/02/2025</span></p>
                            <p class="italic text-sm">Totale prodotti ordinati: <b class="font-bold">4</b></p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <p class="font-light">Totale ordine: <b class="font-bold">€ 1400,00</b></p>

                            <div class="inline-flex items-center gap-2">
                                <p class="italic text-sm">Maggiori informazioni</p>
                                <div class="inline-grid place-items-center transition-transform"
                                    :class="expanded ? 'rotate-180' : ''">
                                    <x-icons.arrow-bottom-line :width="16" :height="16" />
                                </div>
                            </div>
                        </div>
                    </button>

                    <div class="bg-cream-50" x-show="expanded" x-collapse>
                        <div class="p-4 flex flex-col gap-4">
                            <x-utilities.order-item color="brown" image="/assets/products/bilanciata.png"
                                title="Bilanciata" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                            <x-utilities.order-item color="consider" image="/assets/products/depurata.png"
                                title="Depurata" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                            <x-utilities.order-item color="reinvigorated" image="/assets/products/rinvigorita.png"
                                title="Rinvigorita" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                            <x-utilities.order-item color="radiant" image="/assets/products/raggiante.png"
                                title="Raggiante" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                        </div>

                    </div>
                </div>

                <div x-data="{ expanded: false }">

                    <button @click="expanded = ! expanded"
                        class="w-full text-left bg-cream-50 p-4 flex items-center gap-4 justify-between fle-wrap cursor-pointer">
                        <div>
                            <p class="italic">Ordine n. <span class="font-bold">1</span></p>
                            <p class="italic text-md">Effettuato il <span class="font-bold">21/02/2025</span></p>
                            <p class="italic text-sm">Totale prodotti ordinati: <b class="font-bold">4</b></p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <p class="font-light">Totale ordine: <b class="font-bold">€ 1400,00</b></p>

                            <div class="inline-flex items-center gap-2">
                                <p class="italic text-sm">Maggiori informazioni</p>
                                <div class="inline-grid place-items-center transition-transform"
                                    :class="expanded ? 'rotate-180' : ''">
                                    <x-icons.arrow-bottom-line :width="16" :height="16" />
                                </div>
                            </div>
                        </div>
                    </button>

                    <div class="bg-cream-50" x-show="expanded" x-collapse>
                        <div class="p-4 flex flex-col gap-4">
                            <x-utilities.order-item color="brown" image="/assets/products/bilanciata.png"
                                title="Bilanciata" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                            <x-utilities.order-item color="consider" image="/assets/products/depurata.png"
                                title="Depurata" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                            <x-utilities.order-item color="reinvigorated" image="/assets/products/rinvigorita.png"
                                title="Rinvigorita" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                            <x-utilities.order-item color="radiant" image="/assets/products/raggiante.png"
                                title="Raggiante" subtitle="Bruciagrassi" price="30.00" quantity="2"
                                priceTotal="60.00" />
                        </div>

                    </div>
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>
</x-utilities.main>
