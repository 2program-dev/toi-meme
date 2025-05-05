<x-utilities.main>

    {{-- Lista prodotti --}}
    <x-utilities.section>
        <x-utilities.container>
            <h1 class="~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                <span class="italic font-normal font-serif">I nostri prodotti</span>
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-11">
                    @foreach($products as $product)
                        <x-utilities.card color="default" :product="$product" />
                    @endforeach
                </div>
            </x-utilities.container>
        </div>
    </x-utilities.section>

</x-utilities.main>
