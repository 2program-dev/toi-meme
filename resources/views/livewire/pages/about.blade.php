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
                        <div class="py-10">
                            <h1 class="~sm/lg:~text-2xl/3xl leading-none mb-6">Facciamo<br /> <span
                                    class="font-serif italic font-normal">un
                                    patto.</span></h1>
                            <div>
                                <p class="mb-3">Sappiamo che il mondo della bellezza può essere complicato e pieno di promesse difficili da mantenere.
                                    Ma Toi Meme è diverso. Non vendiamo illusioni, ma integratori pensati per supportare il tuo benessere in modo concreto e semplice.
                                    Niente trucchi e niente false promesse, il nostro impegno è offrirti solo ciò che funziona davvero.
                                </p>
                                <p class="mb-3">
                                    Quando parleremo di integratori, ti diremo sempre le cose come stanno. Senza sminuire nulla, ma senza neanche indorare la pillola.
                                    Al massimo, ti inviteremo a mandarla giù con un bel sorso d’acqua. Niente "Mai più unghie fragili!", niente "Il segreto per una pelle splendente!", niente "Capelli fortissimi, capelli bellissimi!". No, zero, nein.
                                    Cosa chiediamo in cambio? Che tu sia determinata a trovare il tuo benessere.
                                    Che tu faccia la tua parte, con pazienza e costanza. Perché gli integratori non fanno miracoli, ma se diventano un’abitudine i risultati arrivano.
                                </p>
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
                    <img src="{{ asset('/assets/company.jpg') }}" class="object-cover size-full">
                </div>
                <div class="basis-1/2">
                    <div class="~sm/lg:~mb-4/6">
                        <h4 class="~sm/lg:~text-1xl/3xl">TOI MÊME</h4>
                    </div>
                    <div>
                        <p>Dalle donne, per le donne. Fondata sulla scienza. Dedicata alla pelle.</p>
                        <p>TOI MÊME nasce da un’idea semplice ma rivoluzionaria: creare un brand che parli alle donne con onestà, intelligenza e rispetto. Siamo donne che lavorano per il benessere di altre donne, mettendo al centro la scienza e il potere della consapevolezza.
                            Crediamo che la bellezza non debba mai essere una promessa vuota. Ogni nostra formula è sviluppata a partire da studi scientifici, con ingredienti attivi realmente efficaci, selezionati per rispondere alle esigenze quotidiane della pelle. Nessuna magia, nessun filtro: solo risultati visibili e reali, supportati dalla ricerca.
                            La nostra missione è aiutarti a sentirti bene nel tuo corpo ogni giorno. Con semplicità e trasparenza.
                            TOI MÊME è più di un brand. È un invito ad ascoltarti, a volerti bene, e a scegliere ciò che funziona. Un invito ad essere te stessa, al meglio.</p>
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
                    <div class="~sm/lg:~mb-4/6">
                        <h4 class="~sm/lg:~text-1xl/3xl">Dietro ogni formula, un’esperta</h4>
                    </div>
                    <div>
                        <p>Susanna, la nostra formulista, non lascia nulla al caso. Ogni ingrediente che
                            trovi nei nostri integratori è selezionato con cura, testato e scelto per
                            garantirti solo il meglio per il tuo benessere. Perché per noi qualità e
                            attenzione ai dettagli sono una missione, non un'opzione.</p>
                    </div>
                </div>
                <div class="basis-1/2">
                    <img src="{{ asset('/assets/formulista.jpg') }}" class="object-cover size-full h-[450px]">
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>

    {{-- CTA --}}
    <x-sections.cta />

</x-utilities.main>
