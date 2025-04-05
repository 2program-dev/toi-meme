<x-utilities.main>
    <x-utilities.section>
        <x-utilities.container>
            <div class="mb-4">
                <p class="font-serif italic font-normal ~sm/lg:~text-1xl/3xl">Carrello</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_0.4fr] gap-4 items-start">
                <div class="flex flex-col gap-4">
                    @foreach($items as $cartItem)
                        <x-utilities.cart-item color="default" :cartItem="$cartItem" />
                    @endforeach
                </div>

                <div class="bg-cream-50 p-4 sticky top-20 flex flex-col gap-4">
                    <div class="flex items-center gap-1 justify-between">
                        <p>Subtotale:</p>
                        <p class="font-bold">€ {{ $total }}</p>
                    </div>

                    <x-utilities.button click="if(confirm('Sei sicuro di voler inviare questo ordine?')) { $wire.checkout() }" tag="button" color="brown">
                        Check-out
                    </x-utilities.button>
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>
</x-utilities.main>
