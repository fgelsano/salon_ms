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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for pages

Route::get('/payments', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');
Route::get('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');

Route::get('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/edit/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('bookings.edit');
Route::get('/bookings/add', [App\Http\Controllers\Admin\BookingController::class, 'create'])->name('bookings.create');
Route::delete('/bookings/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('bookings.destroy');
Route::put('/bookings/update/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('bookings.update');
// Route::put('/bookings/{id}', 'BookingController@update')->name('bookings.update');
Route::post('/bookings/store', [App\Http\Controllers\Admin\BookingController::class, 'store'])->name('bookings.store');

// Route::get('students', [StudentController::class, 'index']);
// Route::get('edit.booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit']);
// Route::get('edit-student/{id}', [StudentController::class, 'edit']);



Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/edit/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
Route::get('/services/add', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
Route::get('/services/delete', [App\Http\Controllers\Admin\ServiceController::class, 'delete'])->name('services.delete');
Route::post('/services/update/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
Route::post('/services/store', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');

Route::get('/customers', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customers.edit');
Route::get('/customers/add', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customers.create');
Route::get('/customers/delete', [App\Http\Controllers\Admin\CustomerController::class, 'delete'])->name('customers.delete');
Route::post('/customers/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customers.update');
Route::post('/customers/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customers.store');

Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');





// routes for Frontend pages
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/services', [App\Http\Controllers\Frontend\FrontendController::class, 'services'])->name('frontend.services');
Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/q.status', [App\Http\Controllers\Frontend\FrontendController::class, 'queuestatus'])->name('frontend.queuestatus');