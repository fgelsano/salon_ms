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
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for pages


// Route::get('/reviews', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
// routes for reviews
Route::prefix('reviews')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'edit'])->name('reviews.edit');
    Route::get('/add', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('reviews.create');
    Route::delete('/{review}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('reviews.update');
    Route::post('/store', [App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('reviews.store');
});

// route for bookings table
Route::prefix('bookings')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('bookings.edit');
    Route::get('/add', [App\Http\Controllers\Admin\BookingController::class, 'create'])->name('bookings.create');
    Route::delete('/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('bookings.update');
    Route::post('/store', [App\Http\Controllers\Admin\BookingController::class, 'store'])->name('bookings.store');
    Route::get('/booking_details/{id}', [App\Http\Controllers\Admin\BookingController::class, 'booking_details'])->name('bookings.booking_details');

    
});

// route for services table
Route::get('admin/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
Route::get('services/edit/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
Route::get('services/add', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
Route::delete('service/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
Route::put('services/update/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
Route::post('services/store', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');



// route for customers table
Route::get('/customers', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/edit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customers.edit');
Route::get('/customers/add', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customers.create');
Route::delete('/customers/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customers.destroy');
Route::post('/customers/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customers.update');
Route::post('/customers/store', [App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customers.store');

// Routes for payments
Route::get('/payments', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/edit/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'edit'])->name('payments.edit');
Route::get('/payments/add', [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('payments.create');
Route::delete('/payment/{payment}', [App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('/payments/update/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('payments.update');
Route::post('/payments/store', [App\Http\Controllers\Admin\PaymentController::class, 'store'])->name('payments.store');


// route for settings table
Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
Route::any('/settimgs/send-sms', [App\Http\Controllers\Admin\SMSController::class, 'index'])->name('send-sms.index');
Route::any('/settimgs/clickatell-sms', [App\Http\Controllers\Admin\ClickController::class, 'index'])->name('clickatell-sms.index');
// route for reports table
Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');

// Route for Employees Table
Route::get('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [App\Http\Controllers\Admin\EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('employees.destroy');






// routes for Frontend pages
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/fservices', [App\Http\Controllers\Frontend\FrontendController::class, 'services'])->name('frontend.fservices');
Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/q.status', [App\Http\Controllers\Frontend\FrontendController::class, 'queuestatus'])->name('frontend.queuestatus');
// Route::get('/services', 'ServicesController@index')->name('frontend.services');
