<x-utilities.main>
    {{-- Hero --}}
    <x-utilities.section class="overflow-y-hidden bg-gradient-to-t from-[#f4e3d0] to-[#c49477]" hasSpace={{ false }}>
        <div class=" overflow-hidden relative">
            <img src="{{ asset('/assets/hero-homepage-prodotti-v2.png') }}"
                class="w-full h-auto object-top object-cover  inset-0">
        </div>
    </x-utilities.section>

    {{-- Sezione - facciamo un patto --}}
    <x-sections.text-inline-image />

    {{-- La nostra filosofia --}}
    <x-utilities.section hasSpace={{ false }}>
        <div class="bg-consider text-center flex flex-col items-center gap-4 py-9">
            <div class="mb-6">
                <p class="~sm/lg:~text-1xl/3xl">La nostra <span class="font-serif italic font-normal">filosofia</span></p>
            </div>
            <x-utilities.button href="/about">Scopri di più</x-utilities.button>
        </div>
    </x-utilities.section>

    {{-- Lista prodotti --}}
    <x-utilities.section>
        <x-utilities.container>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-11">

                @if (isset($products[0]))
                    <x-utilities.card color="default" :product="$products[0]" />
                @endif
                @if (isset($products[1]))
                    <x-utilities.card color="default" :product="$products[1]" />
                @endif
                @if (isset($products[2]))
                    <x-utilities.card color="default" :product="$products[2]" />
                @endif

                {{-- Box full --}}
                <div class="col-span-full max-h-[421px] overflow-hidden bg-consider">
                    <img src="{{ asset('/assets/product-grid-center-banner.jpg') }}" class="object-cover">
                </div>

                {{-- Card 4 - Raggiante --}}
                @if (isset($products[3]))
                    <x-utilities.card color="default" :product="$products[3]" />
                @endif

                {{-- Box - Banner --}}
                <div class="grid row-span-2 bg-cream">
                    <div class="py-5 px-4 grid place-items-center">
                        <div class="text-center space-y-4">
                            <p class="~sm/lg:~text-xl/2xl leading-none">
                                <span class="font-serif italic font-normal">Banner</span> informazioni
                            </p>

                            <div class="max-w-[230px] mx-auto">
                                <p class="text-base">Se non sei una P.IVA contattaci per avere informazioni sui prodotti
                                </p>
                            </div>

                            <div class="mt-6">
                                <x-utilities.button href="{{ route('contacts') }}" border size="sm">Lascia la mail</x-utilities.button>
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($products[4]))
                    <x-utilities.card color="default" :product="$products[4]" />
                @endif

                @if($products->count() > 5)
                    @foreach($products->slice(5) as $product)
                        <x-utilities.card color="default" :product="$product" />
                    @endforeach
                @endif
            </div>
        </x-utilities.container>
    </x-utilities.section>

    {{-- Box - Focus ingredienti --}}
    <x-utilities.section class="bg-orange text-white">
        <x-utilities.container>
            <div class="flex flex-col md:flex-row md:items-center gap-x-20 gap-y-4">
                <div class="basis-1/2">
                    <img src="{{ asset('/assets/focus-ingredienti.jpg') }}" class="object-contain size-full">
                </div>
                <div class="basis-1/2">
                    <div class="~sm/lg:~mb-4/6">
                        <h4 class="~sm/lg:~text-1xl/3xl">Ingredienti che parlano da sé e fanno parlare di sé</h4>
                    </div>
                    <div class="md:max-w-[446px]">
                        <p>Tutti i nostri ingredienti sono scelti con un solo obiettivo: proteggere la
                            tua bellezza dall’interno. Niente fronzoli, solo attivi naturali e potenti. Ogni
                            formula è studiata per lavorare in sintonia con il tuo corpo, sostenendo la tua
                            bellezza e il tuo benessere in modo concreto e visibile. Essenziale, efficace,
                            autentico – perché crediamo che prendersi cura di sé debba essere semplice e
                            reale, proprio come te.</p>
                    </div>
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>

    {{-- CTA --}}
    <x-sections.cta />
</x-utilities.main>
