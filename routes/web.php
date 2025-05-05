<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Product;
use App\Livewire\Pages\ContactsV2;
use App\Livewire\Pages\Login;
use App\Livewire\Pages\Products;
use App\Livewire\Pages\Registration;
use App\Livewire\Pages\Cart;
use App\Livewire\Pages\OrderList;
use App\Livewire\Pages\EditProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/products', Products::class)->name('products');
Route::get('/product/{slug}', Product::class)->name('product');
Route::get('/about', About::class)->name('about');
Route::get('/contacts', ContactsV2::class)->name('contacts');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/registration', Registration::class)->name('registration');
});


Route::middleware(['verified', 'role:customer'])->group(function () {
    Route::middleware('approved')->group(function () {
        Route::get('/cart', Cart::class)->name('cart');
    });
    Route::get('/order-list', OrderList::class)->name('order-list');
    Route::get('/edit-profile', EditProfile::class)->name('edit-profile');
});
