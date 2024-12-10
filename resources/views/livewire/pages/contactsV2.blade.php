<x-utilities.main class="text-black grid place-items-center">
    <x-utilities.section>
        <x-utilities.container>
            <h1 class="~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Vuoi sapere di più <br /> <span class="italic font-normal font-serif">sui nostri prodotti</span>
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="small">
                <form class="flex flex-col gap-8 lg:gap-16 items-center w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-5 gap-x-3">
                        <input
                            class="px-4 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none"
                            type="text" placeholder="Nome" />
                        <input
                            class="px-4 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none"
                            type="text" placeholder="Cognome" />
                        <input
                            class="px-4 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none"
                            type="text" placeholder="Azienda" />
                        <input
                            class="px-4 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none"
                            type="phone" placeholder="Cellulare" />
                        <input
                            class="px-4 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none col-span-full"
                            type="email" placeholder="Mail" />
                        <input
                            class="px-4 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none col-span-full"
                            type="text" placeholder="Oggetto" />
                        <textarea
                            class="px-4 py-2.5 bg-transparent resize-none border rounded-3xl placeholder:text-black placeholder:font-bold focus:outline-none col-span-full h-52"
                            name="" id="" cols="30" rows="10" placeholder="Scrivi qui la tua richiesta..."></textarea>
                    </div>

                    <x-utilities.button tag="button">Contattaci</x-utilities.button>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
