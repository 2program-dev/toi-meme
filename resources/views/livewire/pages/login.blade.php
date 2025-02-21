<x-utilities.main class="text-black grid place-items-center">
    <x-utilities.section class="w-full">
        <x-utilities.container>
            <h1 class="~sm/lg:~text-[2.5rem]/4xl text-center leading-tight">
                Accedi
            </h1>
        </x-utilities.container>

        <div class="mt-8 lg:mt-12">
            <x-utilities.container size="xsmall">
                <form class="flex flex-col gap-8 lg:gap-16 w-full">
                    <div class="grid grid-cols-1 gap-y-5 gap-x-3">
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="email" placeholder="Email" />
                        <input
                            class="px-7 py-2.5 bg-transparent border rounded-full placeholder:text-black placeholder:font-bold focus:outline-none transition-shadow focus:ring ring-orange/25"
                            type="password" placeholder="Password" />

                    </div>

                    <x-utilities.button tag="button">Continua</x-utilities.button>
                </form>
            </x-utilities.container>
        </div>
    </x-utilities.section>
</x-utilities.main>
