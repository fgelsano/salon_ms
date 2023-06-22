<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

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



Auth::routes();


Route::get('/addbooking', [App\Http\Controllers\Admin\BookingController::class, 'addbooking'])->name('bookings.createbooking');
Route::post('/storebooking', [App\Http\Controllers\Admin\BookingController::class, 'storebooking'])->name('bookings.storebooking');
Route::post('/getBookingData', [App\Http\Controllers\Admin\BookingController::class, 'getBookingData'])->name('bookings.getBookingData');
Route::post('/submit-form', [App\Http\Controllers\FormController::class, 'submit'])->name('submit-form');
Route::get('/addreviews', [App\Http\Controllers\Admin\ReviewController::class, 'addreviews'])->name('reviews.addreviews');
Route::post('/store', [App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('reviews.store');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
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
// Route::delete('service/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
Route::delete('services/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
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
Route::get('/paymentshistory', [App\Http\Controllers\Admin\PaymentController::class, 'indexhistory'])->name('payments.indexhistory');
Route::get('/payments/edit/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'edit'])->name('payments.edit');
Route::get('/payments/add', [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('payments.create');
Route::delete('/payment/{payment}', [App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('/payments/update/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('payments.update');
Route::post('/payments/store', [App\Http\Controllers\Admin\PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{payment}', [App\Http\Controllers\Admin\PaymentController::class, 'show'])->name('payments.show');


// Routes for reports
Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');

Route::get('/view/{id}', [App\Http\Controllers\Admin\ReportController::class, 'view'])->name('reports.view');

// route for settings table
Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
Route::any('/settings/send-sms', [App\Http\Controllers\Admin\SMSController::class, 'index'])->name('send-sms.index');

// Route for Employees Table
Route::get('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [App\Http\Controllers\Admin\EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('employees.destroy');



// Route::post('/send-sms', [App\Http\Controllers\Admin\SMSController::class, 'index'])->name('send-sms.index');



// routes for Frontend pages

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'home'])->name('frontend.home');
Route::get('/status', [App\Http\Controllers\Frontend\FrontendController::class, 'status'])->name('frontend.status');

// Route::get('/services', 'ServicesController@index')->name('frontend.services');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
