<x-utilities.main>
    <x-utilities.section>
        <x-utilities.container>
            <div class="flex justify-end gap-6">
                @if(Auth::check())
                    <a href="{{ route('edit-profile') }}"
                            class="text-md font-semibold text-orange hover:text-orange-600 transition-colors duration-200">Modifica profilo</a>
                    <button wire:click="logout"
                            class="text-md font-semibold text-orange hover:text-orange-600 transition-colors duration-200">Esci</button>
                @endif
            </div>

            <div class="mb-4">
                <p class="font-serif italic font-normal ~sm/lg:~text-1xl/3xl">Lista ordini</p>
            </div>


            <div class="flex flex-col gap-4">
                @foreach($orders as $order)
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = ! expanded"
                            class="w-full text-left bg-cream-50 p-4 flex items-center gap-4 justify-between fle-wrap cursor-pointer">
                            <div>
                                <p class="italic">Ordine n. <span class="font-bold">{{ $order->formatted_order_number }}</span></p>
                                <p class="italic text-md">Effettuato il <span class="font-bold">{{ $order->created_at->format('d/m/Y') }}</span></p>
                                <p class="italic text-sm">Totale prodotti ordinati: <b class="font-bold">{{ count($order->orderRows) }}</b></p>
                            </div>

                            <div class="flex flex-col gap-2 items-end">
                                <p class="font-light text-right">Stato dell'ordine: <b class="font-bold">{{ $order->order_status }}</b></p>
                                <p class="font-light">Totale ordine: <b class="font-bold">€ {{ $order->formatted_total }}</b></p>

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
                                @foreach($order->orderRows as $orderRow)
                                    <x-utilities.order-item color="default" image="{{ $orderRow->product->image }}"
                                        title="{{ $orderRow->product_title }}" subtitle="{{ $orderRow->product->category }}" price="{{ $orderRow->formatted_price }}" quantity="{{ $orderRow->quantity }}"
                                        priceTotal="{{ $orderRow->formatted_total }}" />
                                @endforeach
                            </div>

                        </div>
                </div>
                @endforeach
            </div>
        </x-utilities.container>
    </x-utilities.section>
</x-utilities.main>
