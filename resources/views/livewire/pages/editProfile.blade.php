<x-utilities.main class="text-black grid place-items-center">
    <x-utilities.section class="w-full">
        <x-utilities.container>
            <h1 class="font-serif font-normal italic ~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Modifica dati profilo
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="small">
                <form class="flex flex-col gap-8 lg:gap-16 w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-5 gap-x-3">
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Nome" value="Mario" />
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Cognome" value="Rossi" />
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="email" placeholder="Email" value="mario.rossi@mail.com" />
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="phone" placeholder="Telefono" value="+39 123456789" />
                        <input
                            class="col-span-2 px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Indirizzo" value="Via Roma 1, Roma, Italia" />
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="password" placeholder="Password" />
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="password" placeholder="Conferma Password" />
                    </div>

                    <x-utilities.button tag="button">Applica modifiche</x-utilities.button>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
