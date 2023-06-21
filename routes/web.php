<?php

use App\Http\Controllers\CartController;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\TestShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class)->name('shop');

Route::get('/cart', CartComponent::class)->name('product.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

Route::get('/search',SearchComponent::class)->name('product.search');

// Normal user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {});
Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
// Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
        // Category
        Route::get('/categories', AdminCategoryComponent::class)->name('admin.categories');
        Route::get('/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
        Route::get('/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

        // Product
        Route::get('/products', AdminProductComponent::class)->name('admin.products');
        Route::get('/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
        Route::get('/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');
        
        // Home slider
        Route::get('/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
        Route::get('/slider/add', AdminAddHomeSliderComponent::class)->name('admin.add-homeslider');
        Route::get('/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.edit-homeslider');

        Route::get('/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');

        Route::get('/sale',AdminSaleComponent::class)->name('admin.sale');
    });

});
