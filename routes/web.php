<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Product;
use App\Livewire\Pages\Components;
use App\Livewire\Pages\ContactsV2;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/product', Product::class)->name('product');
Route::get('/about', About::class)->name('about');
Route::get('/contacts', ContactsV2::class)->name('contacts');
