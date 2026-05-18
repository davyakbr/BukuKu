<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Models\Product;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| DETAIL PRODUK (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return view('user.detail', compact('product'));
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                'productCount' => Product::count(),
                'categoryCount' => Category::count(),
            ]);
        })->name('admin.dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });


/*
|--------------------------------------------------------------------------
| USER ROUTE (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

   Route::get('/home', [UserProductController::class, 'index'])->name('user.products');

    // ===== Purchase =====
    Route::post('/product/{id}/purchase', [UserProductController::class, 'purchase'])
        ->name('user.purchase');

    // ===== Payment =====
    Route::get('/payment/{orderId}', [UserProductController::class, 'showPaymentForm'])
        ->name('user.payment.form');

    Route::post('/payment/{orderId}/process', [UserProductController::class, 'processPayment'])
        ->name('user.payment.process');

    Route::get('/payment/{orderId}/success', [UserProductController::class, 'paymentSuccess'])
        ->name('user.payment.success');

    // ===== Cart =====
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('user.cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('user.cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('user.cart.remove');

    Route::post('/cart/increment/{id}', [CartController::class, 'increment'])->name('user.cart.increment');
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrement'])->name('user.cart.decrement');

    // ===== Checkout =====
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('user.checkout.process');
    Route::get('/checkout/success/{orderId}', [CheckoutController::class, 'success'])->name('user.checkout.success');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (BREEZE)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';