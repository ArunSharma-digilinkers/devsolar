<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AbandonedCheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ShippingZoneController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Admin\GalleryController;



Route::get('/', [PagesController::class, 'index']);
Route::get('/about-us', [PagesController::class, 'about']);
Route::get('/contact-us', [PagesController::class, 'contact']);
Route::get('/gallery', [PagesController::class, 'gallery']);
Route::get('/franchise', [PagesController::class, 'franchise']);
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/details/{slug}', [PagesController::class, 'showblog'])->name('details.showblog');

// Products
Route::get('solar-panel', [PagesController::class, 'solarpanel']);
Route::get('hybrid-8g-inverter', [PagesController::class, 'hybrideight']);
Route::get('hybrid-9g-inverter', [PagesController::class, 'hybridnine']);
Route::get('lithium-po4-battery', [PagesController::class, 'lithiumbattery']);
Route::get('solar-hybrid-ac', [PagesController::class, 'solarac']);
Route::get('solar-c10-battery', [PagesController::class, 'solarbattery']);

Route::get('/category/{slug}', [PagesController::class, 'category'])->name('category.products');
Route::get('/product/{id}', [PagesController::class, 'show'])->name('product.show');


/* ADMIN ROUTES */
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::resource('categories', CategoriesController::class);
  Route::resource('products', ProductController::class);
  Route::resource('abandoned-checkouts', AbandonedCheckoutController::class);
  Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
  Route::get('orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
  Route::post('orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
  Route::resource('addons', AddonController::class)->except('show');
  Route::resource('coupons', CouponController::class)->except('show');
  Route::resource('shipping-zones', ShippingZoneController::class)->except('show');
  Route::resource('blog', BlogController::class);
  Route::resource('abandoned-checkouts', App\Http\Controllers\Admin\AbandonedCheckoutController::class)->only(['index', 'show', 'destroy']);
   Route::resource('gallery', GalleryController::class);
});

/* USER ROUTES */
Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders/{order}', [UserDashboardController::class, 'showOrder'])->name('orders.show');
    Route::resource('addresses', AddressController::class)->except(['show']);
});

// Cart
    Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{slug}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{slug}', [CartController::class, 'remove'])->name('cart.remove');

  // chekout
  Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/place', [CheckoutController::class, 'placeOrder']) ->name('checkout.place');
    Route::post('/checkout/apply-coupon', [CheckoutController::class, 'applyCoupon'])->name('checkout.applyCoupon');
    Route::get('/checkout/remove-coupon', [CheckoutController::class, 'removeCoupon'])->name('checkout.removeCoupon');
    Route::get('/checkout/shipping-cost', [CheckoutController::class, 'getShippingCost'])->name('checkout.shippingCost');
    Route::post('/checkout/save-abandoned', [CheckoutController::class, 'saveAbandonedCheckout'])->name('checkout.saveAbandoned');
    Route::get('/checkout/address/{address}', [CheckoutController::class, 'getAddress'])->name('checkout.getAddress');
    Route::get('/payment-success/{order}', function (Order $order) {return view('payment.success', compact('order'));})->name('payment.success');

    // Invoice downloads
    Route::get('/invoice/{order}', [InvoiceController::class, 'download'])->middleware('auth')->name('invoice.download');
    Route::post('/admin/invoices/bulk-download', [InvoiceController::class, 'bulkDownload'])->middleware(['auth', 'role:admin'])->name('admin.invoices.bulk');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [PagesController::class, 'allUsers'])->name('user.index');


require __DIR__.'/auth.php';
