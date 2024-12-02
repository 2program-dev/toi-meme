<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\Contacts;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/product', Product::class)->name('product');
Route::get('/about', About::class)->name('about');
Route::get('/contacts', Contacts::class)->name('contacts');
