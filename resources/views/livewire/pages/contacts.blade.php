<x-utilities.main class="bg-orange text-white grid place-items-center">
    <x-utilities.section>
        <x-utilities.container>
            <h1 class="~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Vuoi sapere di più <br /> <span class="italic font-normal font-serif">sui nostri prodotti?</span>
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="small">
                <form class="flex flex-col gap-8 lg:gap-16 items-center">
                    <div class="grid grid-cols-1 lg:grid-cols-3 divide-y divide-black border-y border-black ">
                        <div
                            class="divide-y lg:divide-y-0 lg:divide-x divide-black col-span-full grid grid-cols-subgrid lg:my-4 lg:*:pr-4">
                            <input
                                class="bg-transparent placeholder:text-white placeholder:font-bold focus:outline-none max-lg:py-4"
                                type="text" placeholder="Nome Cognome" />
                            <input
                                class="bg-transparent placeholder:text-white placeholder:font-bold focus:outline-none max-lg:py-4 lg:pl-4"
                                type="text" placeholder="Azienda" />
                            <input
                                class="bg-transparent placeholder:text-white placeholder:font-bold focus:outline-none max-lg:py-4 lg:pl-4 lg:!pr-0"
                                type="phone" placeholder="Cell." />
                        </div>
                        <input
                            class="bg-transparent placeholder:text-white placeholder:font-bold focus:outline-none py-4 col-span-full"
                            type="email" placeholder="Mail..." />
                        <input
                            class="bg-transparent placeholder:text-white placeholder:font-bold focus:outline-none py-4 col-span-full"
                            type="text" placeholder="Oggetto..." />
                        <textarea name="" id="" cols="30" rows="10" placeholder="Scrivi qui la tua richiesta..."
                            class="resize-none bg-transparent placeholder:text-white placeholder:font-bold focus:outline-none py-4 col-span-full h-52"></textarea>
                    </div>

                    <x-utilities.button type='secondary' tag="button">Contattaci</x-utilities.button>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
