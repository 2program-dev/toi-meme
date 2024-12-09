<x-utilities.main>
    <x-utilities.section>
        <x-utilities.container>
            <div class="space-y-8">
                {{-- Text --}}
                <div>
                    <p class="text-sm">Display sm</p>
                    <p class="text-base">Display base</p>
                    <p class="text-md">Display md</p>
                    <p class="~sm/lg:~text-md/lg">Display lg</p>
                    <p class="~sm/lg:~text-md/xl">Display xl</p>
                    <p class="~sm/lg:~text-lg/1xl">Display text-1xl</p>
                    <p class="~sm/lg:~text-xl/2xl">Display text-2xl</p>
                    <p class="~sm/lg:~text-1xl/3xl">Display text-3xl</p>
                    <p class="~sm/lg:~text-2xl/4xl">Display text-4xl</p>
                </div>

                <hr />
                {{-- Button --}}
                <div>
                    <x-utilities.button size="lg">Bottone</x-utilities.button>
                    <x-utilities.button>Bottone</x-utilities.button>
                    <x-utilities.button size="sm">Bottone</x-utilities.button>
                </div>
            </div>
        </x-utilities.container>
    </x-utilities.section>
</x-utilities.main>


{{--
"4xl"
"3xl"
"2xl"
"1xl"
"xl"
"lg"
"md"
"base"
"sm"
--}}
