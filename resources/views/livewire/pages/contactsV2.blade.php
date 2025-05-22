<x-utilities.main class="text-black grid place-items-center">
    <x-utilities.section>
        <x-utilities.container>
            <h1 class="~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Vuoi sapere di più <br /> <span class="italic font-normal font-serif">sui nostri prodotti?</span>
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="small">
                <form wire:submit.prevent="sendEmail" class="flex flex-col gap-8 lg:gap-16 items-center w-full">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-5 gap-x-3">
                        <div class="flex flex-col">
                            <input
                                wire:model.defer="first_name"
                                class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                                type="text" placeholder="Nome*" />
                            @error('first_name') <span class="text-[#ff0000] text-sm">{{ $message }}</span> @enderror

                        </div>
                        <div class="flex flex-col">
                            <input
                                wire:model.defer="last_name"
                                class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                                type="text" placeholder="Cognome*" />
                            @error('last_name') <span class="text-[#ff0000] text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <input
                                wire:model.defer="company"
                                class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                                type="text" placeholder="Azienda" />
                        </div>
                       <div>
                           <input
                               wire:model.defer="phone"
                               class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                               type="phone" placeholder="Cellulare" />
                       </div>
                        <div class="flex flex-col col-span-full">
                            <input
                                wire:model.defer="email"
                                class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25 w-full"
                                type="email" placeholder="Mail*" />
                            @error('email') <span class="text-[#ff0000] text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col col-span-full">
                            <input
                                wire:model.defer="subject"
                                class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25 w-full"
                                type="text" placeholder="Oggetto" />
                        </div>
                        <div class="flex flex-col col-span-full">
                            <textarea
                                wire:model.defer="message"
                                class="px-7 py-2.5 bg-transparent resize-none border rounded-3xl placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25 w-full h-52"
                                name="" id="" cols="30" rows="10" placeholder="Scrivi qui la tua richiesta...*"></textarea>
                            @error('message') <span class="text-[#ff0000] text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <x-utilities.button tag="button">Contattaci</x-utilities.button>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
