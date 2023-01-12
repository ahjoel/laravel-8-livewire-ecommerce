<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', \App\Http\Livewire\HomeComponent::class);

Route::get('/shop', \App\Http\Livewire\ShopComponent::class);

Route::get('/cart', \App\Http\Livewire\CartComponent::class)->name('product.cart');

Route::get('/checkout', \App\Http\Livewire\CheckoutComponent::class);

Route::get('/product/{slug}', \App\Http\Livewire\DetailComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', \App\Http\Livewire\CategoryComponent::class)->name('product.category');

Route::get('/search', \App\Http\Livewire\SearchComponent::class)->name('product.search');

// For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', \App\Http\Livewire\Admin\AdminCategoryComponent::class)->name('admin.categories');
});
