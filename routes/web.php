<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



//FRONTEND START

//home
Route::get('/', [HomeController::class, 'home'])->name('homepage');

//customer registration
Route::get('/signup', [CustomerController::class, 'customerSignup'])->name('signup');
Route::post('/do/signup', [CustomerController::class, 'submitSignup'])->name('submit.signup');

//customer login
Route::get('/signin', [CustomerController::class, 'signinForm'])->name('customer.signin');
Route::post('/do/signin', [CustomerController::class, 'submitSignin'])->name('submit.customer.signin');

//about-us
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');

//contact-us
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//application
Route::get('/application-create', [HomeController::class, 'applicationCreate'])->name('create.application');

//middleware for website
Route::group(['middleware' => 'auth:customerGuard'], function () {

    //customer view, edit & update
    Route::get('/view/profile', [CustomerController::class, 'viewProfile'])->name('customer.view.profile');
    Route::get('/customer/edit', [CustomerController::class, 'customerEdit'])->name('customer.edit');
    Route::put('/customer/update', [CustomerController::class, 'customerUpdate'])->name('customer.update');

    //customer logout
    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});

//FRONTEND END



//BACKEND END

//prefix for admin panel
Route::group(['prefix' => 'admin'], function () {

    //admin login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/do/login', [AuthController::class, 'login'])->name('login.submit');

    //middleware for admin panel
    Route::group(['middleware' => ['auth:admin']], function () {

        //dashboard
        Route::get('/', [DashboardController::class, 'homepage'])->name('dashboard');

        // event 
        Route::get('/event', [EventController::class, 'eList'])->name('admin.event.list');
        Route::get('/event/form', [EventController::class, 'eForm'])->name('admin.event.form');
        Route::post('/event/form/submit', [EventController::class, 'eFormSubmit'])->name('admin.eForm.submit');

        // service 
        Route::get('/service', [ServiceController::class, 'sList'])->name('admin.service.list');
        Route::get('/service/form', [ServiceController::class, 'sForm'])->name('admin.service.form');
        Route::post('/service/form/submit', [ServiceController::class, 'sFormSubmit'])->name('admin.sForm.submit');

        // booking
        Route::get('/gallery', [GalleryController::class, 'gList'])->name('admin.gallery.list');
        Route::get('/gallery/form', [GalleryController::class, 'gForm'])->name('admin.gallery.form');
        Route::post('/gallery/form/submit', [GalleryController::class, 'gFormSubmit'])->name('admin.gForm.submit');

        //admin logout
        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('logout');
    });
});
