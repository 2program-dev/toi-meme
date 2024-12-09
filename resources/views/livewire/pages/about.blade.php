<x-utilities.main>
    {{-- Hero --}}
    <x-utilities.section hasSpace={{ false }}>
        <div class="min-h-[75vh] overflow-hidden relative grid">
            <div class="absolute w-1/2 h-full bg-gradient-to-r from-orange from-80%"></div>
            <img src="{{ asset('/assets/hands.jpg') }}"
                class="w-3/4 h-full inset-y-0 right-0 object-cover absolute -z-10">

            <div class="relative z-10 text-white h-full grid place-items-center">
                <x-utilities.container>
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <h1 class="~sm/lg:~text-2xl/3xl leading-none mb-6">Facciamo<br /> <span
                                    class="font-serif italic font-normal">un
                                    patto.</span></h1>
                            <div class="max-w-[446px]">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum
                                    has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer
                                    took a
                                    galley of type and scrambled it to make a type specimen book. </p>
                            </div>
                        </div>
                    </div>
                </x-utilities.container>
            </div>
        </div>
    </x-utilities.section>

    {{-- Sezione - facciamo un patto --}}
    <x-sections.text-inline-image />

    {{-- Testo azienda --}}
    <x-utilities.section class="bg-cream">
        <x-utilities.container>
            <div class="flex flex-col-reverse md:flex-row md:items-center gap-x-20 gap-y-4">
                <div class="basis-1/2">
                    <img src="{{ asset('/assets/focus-ingredienti.jpg') }}" class="object-cover size-full">
                </div>
                <div class="basis-1/2">
                    <div class="~sm/lg:~mb-4/6">
                        <h4 class="~sm/lg:~text-1xl/3xl">Testo azienda</h4>
                    </div>
                    <div class="md:max-w-[446px]">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. </p>
                    </div>
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>

    {{-- Cura ingredienti --}}
    <x-utilities.section>
        <x-utilities.container>
            <div class="flex flex-col md:flex-row md:items-center gap-x-20 gap-y-4">
                <div class="basis-1/2">
                    <div class="md:max-w-[379px] ~sm/lg:~mb-4/6">
                        <h4 class="~sm/lg:~text-1xl/3xl">Formulista e cura degli ingredienti</h4>
                    </div>
                    <div class="md:max-w-[446px]">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
                <div class="basis-1/2">
                    <img src="{{ asset('/assets/focus-ingredienti.jpg') }}" class="object-cover size-full">
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>

    {{-- CTA --}}
    <x-sections.cta />

</x-utilities.main>
