<x-utilities.main class="text-black grid place-items-center">
    <x-utilities.section class="w-full">
        <x-utilities.container>
            <h1 class="font-serif font-normal italic ~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Modifica dati profilo
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="small">
                <form wire:submit.prevent="handleEditProfile" class="flex flex-col gap-8 lg:gap-16 w-full">
                    <div class="grid grid-cols-1 gap-y-5 gap-x-3">
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Nome*" wire:model.defer="form.first_name" />
                        @error('form.first_name')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Cognome*" wire:model.defer="form.last_name" />
                        @error('form.last_name')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="email" placeholder="Email*" wire:model.defer="form.email" />
                        @error('form.email')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Telefono*" wire:model.defer="form.phone" />
                        @error('form.phone')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="mt-8 px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="password" placeholder="Password" wire:model.defer="form.password" />
                        @error('form.password')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <p><small>Compilare il campo password solo se si intende modificarla, altrimenti lasciare vuoto</small></p>

                        <h3 class="font-serif font-normal italic text-[2rem] mt-4 text-center leading-tight">Dati aziendali</h3>
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Ragione sociale" wire:model.defer="form.company" />
                        @error('form.company')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Partita IVA" wire:model.defer="form.vat" />
                        @error('form.vat')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Codice fiscale" wire:model.defer="form.fiscal_code" />
                        @error('form.fiscal_code')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="SDI" wire:model.defer="form.sdi" />
                        @error('form.sdi')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror

                        <h3 class="font-serif font-normal italic text-[2rem] mt-4 text-center leading-tight">Indirizzo di fatturazione</h3>
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Indirizzo*" wire:model.defer="form.billing_address" />
                        @error('form.billing_address')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Città*" wire:model.defer="form.billing_city"  />
                        @error('form.billing_city')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Provincia*" maxlength="2" minlength="2" wire:model.defer="form.billing_state"  />
                        @error('form.billing_state')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="CAP*" maxlength="5" minlength="5" wire:model.defer="form.billing_zip"  />
                        @error('form.billing_zip')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Stato*" wire:model.defer="form.billing_country"  />
                        @error('form.billing_country')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror

                        <h3 class="font-serif font-normal italic text-[2rem] mt-4 text-center leading-tight">Indirizzo di spedizione</h3>
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Indirizzo*" wire:model.defer="form.shipping_address"  />
                        @error('form.shipping_address')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Città*" wire:model.defer="form.shipping_city" />
                        @error('form.shipping_city')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Provincia*" maxlength="2" minlength="2" wire:model.defer="form.shipping_state" />
                        @error('form.shipping_state')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="CAP*" maxlength="5" minlength="5" wire:model.defer="form.shipping_zip" />
                        @error('form.shipping_zip')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="text" placeholder="Stato*" wire:model.defer="form.shipping_country" />
                        @error('form.shipping_country')
                        <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror

                    </div>
                    <x-utilities.button tag="button">Applica modifiche</x-utilities.button>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
