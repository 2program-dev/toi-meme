<x-utilities.main class="text-black grid place-items-center">
    <x-utilities.section class="w-full">
        <x-utilities.container>
            <h1 class="font-serif font-normal italic ~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Accedi
            </h1>

        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="xsmall">
                <form wire:submit.prevent="login" class="flex flex-col gap-8 lg:gap-16 w-full">
                    @error('general')
                        <span class="text-[#ff0000] text-center text-sm mt-1">{{ $message }}</span>
                    @enderror

                    <div class="grid grid-cols-1 gap-y-5 gap-x-3">
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="email" placeholder="Email" wire:model.defer="email" />
                        @error('email')
                            <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror

                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="password" placeholder="Password" wire:model.defer="password" />
                        @error('password')
                            <span class="text-red text-sm mt-1">{{ $message }}</span>
                        @enderror

                    </div>

                    <x-utilities.button tag="button">Continua</x-utilities.button>

                    <div class="text-center mt-8">
                        Non sei ancora registrato? Vai alla pagina di <a href="/registration"
                            class="text-orange hover:underline"><b>registrazione</b></a>
                    </div>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
