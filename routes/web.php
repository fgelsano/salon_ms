<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for pages


Route::get('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');

// route for bookings table
Route::prefix('bookings')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('bookings.edit');
    Route::get('/add', [App\Http\Controllers\Admin\BookingController::class, 'create'])->name('bookings.create');
    Route::delete('/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('bookings.update');
    Route::post('/store', [App\Http\Controllers\Admin\BookingController::class, 'store'])->name('bookings.store');
    
});

// route for services table
Route::get('services/', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
Route::get('services/edit/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
Route::get('services/add', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
Route::delete('service/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
Route::put('services/update/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
Route::post('services/store', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');



// route for customers table
Route::get('/customers', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customers.edit');
Route::get('/customers/add', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customers.create');
Route::delete('/customer/{customer}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customers.destroy');
Route::post('/customers/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customers.update');
Route::post('/customers/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customers.store');

// Routes for payments
Route::get('/payments', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/edit/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'edit'])->name('payments.edit');
Route::get('/payments/add', [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('payments.create');
Route::delete('/payment/{payment}', [App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('payments.destroy');
Route::post('/payments/update/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('payments.update');
Route::post('/payments/store', [App\Http\Controllers\Admin\PaymentController::class, 'store'])->name('payments.store');


// route for settings table
Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');





// routes for Frontend pages
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/services', [App\Http\Controllers\Frontend\FrontendController::class, 'services'])->name('frontend.services');
Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/q.status', [App\Http\Controllers\Frontend\FrontendController::class, 'queuestatus'])->name('frontend.queuestatus');