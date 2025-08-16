<?php

use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\JobCategoryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\WebApplicationController;
use App\Http\Controllers\Frontend\WebCustomerController;
use App\Http\Controllers\Frontend\WebHomeController;
use Illuminate\Support\Facades\Route;



//FRONTEND START

//home
Route::get('/', [WebHomeController::class, 'home'])->name('homepage');

//customer registration
Route::get('/signup', [WebCustomerController::class, 'customerSignup'])->name('signup');
Route::post('/do/signup', [WebCustomerController::class, 'submitSignup'])->name('submit.signup');

//customer login
Route::get('/signin', [WebCustomerController::class, 'signinForm'])->name('customer.signin');
Route::post('/do/signin', [WebCustomerController::class, 'submitSignin'])->name('submit.customer.signin');

//about-us
Route::get('/about-us', [WebHomeController::class, 'aboutUs'])->name('about.us');

//contact-us
Route::get('/contact', [WebHomeController::class, 'contact'])->name('contact');

//Application Form
Route::get('/application-create', [WebApplicationController::class, 'applicationCreate'])->name('create.application');
Route::post('/application-preview', [WebApplicationController::class, 'applicationPreviewStore'])->name('application.preview.store');
Route::get('/application-preview', [WebApplicationController::class, 'applicationPreview'])->name('application.preview');
Route::post('/application/submit', [WebApplicationController::class, 'applicationSubmit'])->name('application.submit');

//services
Route::get('/all-services', [WebHomeController::class, 'all_services'])->name('all.services');

Route::get('/all-gallery', [WebHomeController::class, 'all_gallery'])->name('all.gallery');
Route::get('/all-video', [WebHomeController::class, 'all_video'])->name('all.video');
Route::get('/gallery-images/{id}', [WebHomeController::class, 'gallery_images'])->name('gallery.images');

//middleware for website
Route::group(['middleware' => 'auth:customerGuard'], function () {

    //customer view, edit & update
    Route::get('/view/profile', [WebCustomerController::class, 'viewProfile'])->name('customer.view.profile');
    Route::get('/customer/edit', [WebCustomerController::class, 'customerEdit'])->name('customer.edit');
    Route::put('/customer/update', [WebCustomerController::class, 'customerUpdate'])->name('customer.update');

    //customer logout
    Route::get('/logout', [WebCustomerController::class, 'logout'])->name('customer.logout');
});

//FRONTEND END



//BACKEND START

//prefix for admin panel
Route::group(['prefix' => 'admin'], function () {

    //admin login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/do/login', [AuthController::class, 'login'])->name('login.submit');

    //middleware for admin panel
    Route::group(['middleware' => ['auth:admin']], function () {

        //dashboard
        Route::get('/', [DashboardController::class, 'homepage'])->name('dashboard');

        // service 
        Route::get('/service', [ServiceController::class, 'sList'])->name('admin.service.list');
        Route::post('/service/form/submit', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::get('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

        // gallery
        Route::get('/gallery', [GalleryController::class, 'gList'])->name('admin.gallery.index');
        Route::post('/gallery/store', [GalleryController::class, 'Store'])->name('admin.gallery.store');
        Route::get('/gallery/view/{id}', [GalleryController::class, 'view'])->name('admin.gallery.view');
        Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::get('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

        // video
        Route::get('/video', [VideoController::class, 'index'])->name('video.list');
        Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
        Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
        Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
        Route::put('/video/update/{id}', [VideoController::class, 'update'])->name('video.update');
        Route::get('/video/delete/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

        // job category
        Route::get('/jobcategory', [JobCategoryController::class, 'index'])->name('admin.jobcategory.index');
        Route::post('/jobcategory/store', [JobCategoryController::class, 'Store'])->name('admin.jobcategory.store');
        Route::get('/jobcategory/edit/{id}', [JobCategoryController::class, 'edit'])->name('admin.jobcategory.edit');
        Route::put('/jobcategory/update/{id}', [JobCategoryController::class, 'update'])->name('admin.jobcategory.update');
        Route::get('/jobcategory/delete/{id}', [JobCategoryController::class, 'destroy'])->name('admin.jobcategory.destroy');

        // application-view
        Route::get('/application-view', [ApplicationController::class, 'applicationView'])->name('admin.application.view');
        Route::get('/application-view-details/{id}', [ApplicationController::class, 'applicationViewDetails'])->name('admin.application.view.details');
        Route::get('/application/approve', [ApplicationController::class, 'approve'])->name('admin.application.approve');
        Route::get('/application/reject', [ApplicationController::class, 'reject'])->name('admin.application.reject');

        //admin logout
        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('logout');
    });
});
