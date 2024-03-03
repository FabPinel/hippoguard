<?php

use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\discountController;
use App\Http\Controllers\productController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\cartController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\dashboardController;


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
// Routes générales

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/boutique', function () {
    return view('shop.index');
});

//Dashboard

Route::get('/admin/dashboard', [dashboardController::class, 'index'])
    ->middleware(['auth', 'role:0'])
    ->name('admin.dashboard');
Route::get('/admin/dashboard/last-7-days', [dashboardController::class, 'getDataForLast7Days']);
Route::get('/admin/dashboard/last-30-days', [dashboardController::class, 'getDataForLast30Days']);
Route::get('/admin/dashboard/overall', [dashboardController::class, 'getDataForOverall']);

//Auth
Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('register', [authController::class, 'store'])->name('register.store');
Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/authenticate', [authController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [authController::class, 'logout'])->name('logout');

Route::get('account/verify/{token}', [authController::class, 'verifyAccount'])->name('user.verify');
// Boutique
Route::get('/boutique/{id}', [shopController::class, 'getProductById'])->name('shop.productName');

// Admin - Produits
Route::prefix('/admin/produits')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('/', [productController::class, 'index'])->name('admin.products.index');
    Route::get('/create', [productController::class, 'create'])->name('admin.products.create');
    Route::post('/', [productController::class, 'store'])->name('admin.products.store');
    Route::get('/{id}', [productController::class, 'show'])->name('admin.products.show');
    Route::get('/edit/{id}', [productController::class, 'edit'])->name('admin.products.edit');
    Route::put('/{id}', [productController::class, 'update'])->name('admin.products.update');
    Route::delete('/{id}', [productController::class, 'destroy'])->name('admin.products.destroy');
    Route::put('/{id}/toggle-status', [productController::class, 'toggleStatus'])->name('admin.products.toggle-status');
});

// Admin - Catégories
Route::prefix('/admin/category')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('/create', [productController::class, 'createCategory'])->name('admin.category.create');
    Route::post('/', [productController::class, 'storeCategory'])->name('admin.category.store');
    Route::get('/edit/{id}', [productController::class, 'editCategory'])->name('admin.category.edit');
    Route::put('/{id}', [productController::class, 'updateCategory'])->name('admin.category.update');
    Route::delete('/{id}', [productController::class, 'destroyCategory'])->name('admin.category.destroy');
});

// Admin - Promo
Route::prefix('/admin/discounts')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('/create', [discountController::class, 'create'])->name('admin.discounts.create');
    Route::post('/', [discountController::class, 'store'])->name('admin.discounts.store');
    Route::get('/edit/{id}', [discountController::class, 'edit'])->name('admin.discounts.edit');
    Route::put('/{id}', [discountController::class, 'update'])->name('admin.discounts.update');
    Route::delete('/{id}', [discountController::class, 'destroy'])->name('admin.discounts.destroy');
    Route::put('/{id}/toggle-status', [discountController::class, 'toggleStatus'])->name('admin.discounts.toggle-status');
});

// Panier
Route::get('/panier', [cartController::class, 'panier'])->name('panier');
Route::post('/ajouter-au-panier/{productId}', [cartController::class, 'addToCart'])->name('addToCart');
Route::delete('/remove-from-cart', [cartController::class, 'removeFromCart'])->name('removeFromCart');
Route::put('/update-cart', [cartController::class, 'updateCart'])->name('updateCart');

// Orders
Route::prefix('/admin/orders')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('/', [orderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orderDetails/{id}', [orderController::class, 'orderDetails'])->name('admin.orders.orderDetails');
    Route::post('/orders/toggle-status/{id}', [orderController::class, 'toggleStatus'])->name('admin.orders.toggle-status');
});

// Messages
Route::prefix('/admin/messages')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('/', [contactController::class, 'index'])->name('admin.messages.index');
    Route::post('/', [contactController::class, 'sendMailResponse'])->name('message.response');
});

// Checkout
Route::get('/commande', [cartController::class, 'checkout'])->name('commande');
Route::post('/apply-discount', [discountController::class, 'applyDiscount'])->name('apply.discount');
Route::post('/remove-discount', [discountController::class, 'removeDiscount'])->name('remove.discount');

//Contact
Route::get('/contact', function () {
    return view('shop.contact');
});
Route::get('/contactConfirmation', function () {
    return view('shop.contactConfirmation');
});


Route::post('/contact', [contactController::class, 'sendMail'])->name('contact.store');

// Stripe
Route::post('/session', [cartController::class, 'session'])->name('session');
Route::get('/success', [cartController::class, 'success'])->name('success');
Route::get('/votre-commande', function () {
    return view('shop.order');
});

// Profil
Route::prefix('/mon-compte')->group(function () {
    Route::get('/', [profileController::class, 'index'])->name('profile.index');
    Route::match(['put', 'post', 'get'], '/update', [profileController::class, 'update'])->name('profile.update');
    Route::match(['put', 'post', 'get'], '/address', [profileController::class, 'address'])->name('profile.address');
});
