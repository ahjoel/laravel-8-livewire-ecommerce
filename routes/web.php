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

Route::get('/checkout', \App\Http\Livewire\CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}', \App\Http\Livewire\DetailComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', \App\Http\Livewire\CategoryComponent::class)->name('product.category');

Route::get('/search', \App\Http\Livewire\SearchComponent::class)->name('product.search');

Route::get('/thank-you', \App\Http\Livewire\ThankyouComponent::class)->name('thankyou');

Route::get('/contact-us', \App\Http\Livewire\ContactComponent::class)->name('contact');

// For User or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', \App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', \App\Http\Livewire\User\UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', \App\Http\Livewire\User\UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', \App\Http\Livewire\User\UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password', \App\Http\Livewire\User\UserChangePasswordComponent::class)->name('user.changepassword');
    Route::get('/user/profile', \App\Http\Livewire\User\UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit', \App\Http\Livewire\User\UserEditProfileComponent::class)->name('user.editprofile');
});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', \App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', \App\Http\Livewire\Admin\AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', \App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', \App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products', \App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', \App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', \App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider', \App\Http\Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', \App\Http\Livewire\Admin\AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', \App\Http\Livewire\Admin\AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', \App\Http\Livewire\Admin\AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sale', \App\Http\Livewire\Admin\AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/orders', \App\Http\Livewire\Admin\AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', \App\Http\Livewire\Admin\AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    
    Route::get('/admin/contact-us', \App\Http\Livewire\Admin\AdminContactComponent::class)->name('admin.contacts');
    Route::get('/admin/settings', \App\Http\Livewire\Admin\AdminSettingComponent::class)->name('admin.settings');

});
