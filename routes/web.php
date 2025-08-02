<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



//FRONTEND

Route::get('/', [HomeController::class, 'home'])->name('homepage');


//Customer Registration
Route::get('/signup', [CustomerController::class, 'customerSignup'])->name('signup');
Route::post('/do/signup', [CustomerController::class, 'submitSignup'])->name('submit.signup');

//Customer Login
Route::get('/signin', [CustomerController::class, 'signinForm'])->name('customer.signin');
Route::post('/do/signin', [CustomerController::class, 'submitSignin'])->name('submit.customer.signin');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/application-create', [HomeController::class, 'applicationCreate'])->name('create.application');

Route::group(['middleware' => 'auth:customerGuard'], function () {

 //Customer View, Edit & Update
 Route::get('/view/profile', [CustomerController::class, 'viewProfile'])->name('customer.view.profile');
 Route::get('/customer/edit', [CustomerController::class, 'customerEdit'])->name('customer.edit');
 Route::put('/customer/update', [CustomerController::class, 'customerUpdate'])->name('customer.update');
 Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});

//BACKEND

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/do/login', [AuthController::class, 'login'])->name('login.submit');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('logout');
        Route::get('/', [DashboardController::class, 'homepage'])->name('dashboard');

        // Event
        Route::get('/event', [EventController::class, 'eList'])->name('admin.event.list');
        Route::get('/event/form', [EventController::class, 'eForm'])->name('admin.event.form');
        Route::post('/event/form/submit', [EventController::class, 'eFormSubmit'])->name('admin.eForm.submit');

        // Service
        Route::get('/service', [ServiceController::class, 'sList'])->name('admin.service.list');
        Route::get('/service/form', [ServiceController::class, 'sForm'])->name('admin.service.form');
        Route::post('/service/form/submit', [ServiceController::class, 'sFormSubmit'])->name('admin.sForm.submit');

        // Booking
        Route::get('/booking', [BookingController::class, 'bList'])->name('admin.booking.list');
        Route::get('/booking/form', [BookingController::class, 'bForm'])->name('admin.booking.form');
        Route::post('/booking/form/submit', [BookingController::class, 'bFormSubmit'])->name('admin.bForm.submit');
    });
});
