<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-cloak>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>{{ $title ?? config('app.name') }}</title>
</head>

<body class="">
    <header class="bg-orange text-white border-b border-black">
        <div class="mx-auto px-4 py-6">
            <div class="grid grid-cols-[1fr_2fr_1fr] items-center justify-between gap-4">
                <div class="order-1">
                    <img src="{{ asset('/assets/toi-meme-logo-white.svg') }}" width="335px" height="104px"
                        class="max-w-full h-auto">
                </div>

                <div class="order-2">
                    <ul class="flex items-center justify-center gap-16">
                        <li class="font-light">Prodotti</li>
                        <li class="font-light">Chi siamo</li>
                        <li class="font-light">Contatti</li>
                    </ul>
                </div>

                <div class="order-3">
                    <div class="flex items-center justify-end gap-8">
                        <x-icons.user-line :width="38" :height="38" />
                        <x-icons.cart-line :width="38" :height="38" />
                    </div>
                </div>
            </div>
        </div>
    </header>


    {{ $slot }}

    <footer class="bg-cream text-orange py-8 border-t border-black">
        <div class="max-w-[1230px] mx-auto px-4">
            <div class="flex justify-between gap-4 items-start">
                <img src="{{ asset('/assets/toi-meme-logo-orange.svg') }}" width="323px" height="auto"
                    class="max-w-full h-auto">

                <div class="flex flex-col gap-4 text-right">

                    <ul>
                        <li><b>Toi Meme</b></li>
                        <li>xxxxxxx</li>
                        <li>xxxxxxxxxxxxx</li>
                        <li>toimeme@xxxxx.com</li>
                    </ul>

                    <ul class="flex items-center justify-end gap-6">
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

            <div class="flex justify-between gap-4 mt-10">
                <small class="font-bold">©2024 Loremipsum. All rights reserved</small>

                <ul class="flex items-center justify-end gap-8">
                    <li>
                        <a href="#" class="font-bold">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="" class="font-bold">
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
