<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    /******************* Profile Routes *******************/
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    /******************* Section Title Routes *******************/
    Route::resource('slider', SliderController::class);

    /** Why Choose Us Routes */
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title-update');
    Route::resource('why-choose-us', WhyChooseUsController::class);

    /******************* Product Routes *******************/
    Route::resource('product', ProductController::class);

    /** Product Categories Routes */
    Route::resource('category', CategoryController::class);

    /** Product Gallery Routes */
    Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
    Route::resource('product-gallery', ProductGalleryController::class);

    /** Product Size Routes */
    Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
    Route::resource('product-size', ProductSizeController::class);

    /** Product Option Routes */
    Route::resource('product-option', ProductOptionController::class);

    /******************* Coupon Routes *******************/
    Route::resource('/coupon', CouponController::class);

    /******************* Delivery Routes *******************/
    Route::resource('delivery-area', DeliveryAreaController::class);

    /******************* Orders Routes *******************/
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('orders/status/{id}', [OrderController::class, 'getOrderStatus'])->name('orders.status');
    Route::put('orders/status-update/{id}', [OrderController::class, 'orderStatusUpdate'])->name('orders.status-update');

    /************** Payment Gateway Setting Routes **************/
    Route::get('/payment-gateway-setting', [PaymentGatewaySettingController::class, 'index'])->name('payment-setting.index');
    Route::put('/paypal-setting', [PaymentGatewaySettingController::class, 'paypalSettingUpdate'])->name('paypal-setting.update');
    Route::put('/stripe-setting', [PaymentGatewaySettingController::class, 'stripeSettingUpdate'])->name('stripe-setting.update');

    /******************* Settings Routes *******************/
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/general-settings', [SettingsController::class, 'updateGeneralSettings'])->name('general-settings.update');

});
