<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-cloak>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>{{ $title ?? config('app.name') }}</title>

    {{-- Google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen" :class="{ '!overflow-y-hidden': open == true }" x-data="{ open: false, showBar: false }">
    <header class="bg-orange text-white border-b border-black fixed z-40 inset-x-0 top-0 transition-transform"
        :class="{ '!-translate-y-full': showBar == true }"
        @scroll.window="showBar = (window.scrollY > 120) ? true : false">
        <div class="mx-auto px-4 md:px-8 lg:px-12 xl:pl-28">
            <nav class="flex items-center justify-between h-28 gap-x-8">
                <div class="flex lg:flex-1">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('/assets/toi-meme-logo-white.svg') }}" width="335px" height="104px"
                            class="max-w-full h-auto">
                    </a>
                </div>

                <div class="hidden lg:flex lg:gap-x-12">
                    <ul class="flex items-center justify-center gap-16">
                        <li class="font-light">
                            <a class="underline-offset-8" href="{{ route('product') }}"
                                :class="{ 'underline': window.location.pathname == '/product' }">Prodotti</a>
                        </li>
                        <li class="font-light">
                            <a class="underline-offset-8" href="{{ route('about') }}"
                                :class="{ 'underline': window.location.pathname == '/about' }">Chi siamo</a>
                        </li>
                        <li class="font-light">
                            <a class="underline-offset-8" href="{{ route('contacts') }}"
                                :class="{ 'underline': window.location.pathname == '/contacts' }">Contatti</a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-1 justify-end">
                    <div class="flex items-center justify-end gap-4 lg:gap-8">
                        <a href="#" class="max-sm:hidden">
                            <x-icons.user-line :width="38" :height="38" />
                        </a>
                        <a href="#" class="max-sm:hidden">
                            <x-icons.cart-line :width="38" :height="38" />
                        </a>

                        <button type="button" @click.prevent="open = true"
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 lg:hidden">
                            <x-icons.menu-line :width="38" :height="38" />
                        </button>
                    </div>
                </div>
            </nav>

            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div x-show="open == true" class="backdrop-blur-2xl fixed inset-0 z-10" x-transition.opacity
                    x-transition.duration.300ms></div>
                <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-orange px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-black/50 transition-transform translate-x-full duration-300"
                    :class="{ '!translate-x-0': open == true }">
                    <div class="flex items-center justify-between">
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700"
                            @click.prevent="open = false">
                            <x-icons.close-line :width="38" :height="38" />
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <ul class="flex items-center flex-col justify-center gap-16">
                                    <li class="font-light">
                                        <a class="underline-offset-8" href="{{ route('product') }}"
                                            :class="{ 'underline': window.location.pathname == '/product' }">Prodotti</a>
                                    </li>
                                    <li class="font-light">
                                        <a class="underline-offset-8" href="{{ route('about') }}"
                                            :class="{ 'underline': window.location.pathname == '/about' }">Chi siamo</a>
                                    </li>
                                    <li class="font-light">
                                        <a class="underline-offset-8" href="{{ route('contacts') }}"
                                            :class="{ 'underline': window.location.pathname == '/contacts' }">Contatti</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="sm:hidden flex items-center justify-center gap-8 pt-8">
                                <a href="#">
                                    <x-icons.user-line :width="38" :height="38" />
                                </a>
                                <a href="#">
                                    <x-icons.cart-line :width="38" :height="38" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{ $slot }}

    <footer class="bg-cream text-orange py-8 border-t border-black font-mono">
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="flex justify-between flex-wrap gap-4 items-start @container">
                <img src="{{ asset('/assets/toi-meme-logo-orange.svg') }}" width="323px" height="auto"
                    class="max-w-full h-auto">

                <div class="flex flex-col gap-4 @[488px]:text-right">
                    <ul class="font-medium text-sm">
                        <li><b>Toi Meme</b></li>
                        <li>xxxxxxx</li>
                        <li>xxxxxxxxxxxxx</li>
                        <li>toimeme@xxxxx.com</li>
                    </ul>

                    <ul class="flex items-center @[488px]:justify-end gap-6">
                        <li>
                            <a href="">
                                <x-icons.ig-line :width="31" :height="31" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <x-icons.fb-line :width="31" :height="31" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-wrap justify-between gap-4 mt-10">
                <small class="font-semibold text-base">©2024 Loremipsum. All rights reserved</small>

                <ul class="flex flex-wrap items-center gap-y-2 gap-x-8 text-base">
                    <li>
                        <a href="#" class="font-semibold">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="" class="font-semibold">
                            Terms & Condition
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')

</body>

</html>
