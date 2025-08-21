<?php

use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\ApplicationStatusController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\GlobalOfficeController;
use App\Http\Controllers\Backend\JobCategoryController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\WebApplicationController;
use App\Http\Controllers\Frontend\WebCustomerController;
use App\Http\Controllers\Frontend\WebHomeController;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Route;

//FRONTEND START
//Home
Route::get('/', [WebHomeController::class, 'home'])->name('homepage');

//About-us
Route::get('/about-us', [WebHomeController::class, 'aboutUs'])->name('about.us');

//Services
Route::get('/all-services', [WebHomeController::class, 'all_services'])->name('all.services');

//Application Form
Route::get('/application-create', [WebApplicationController::class, 'applicationCreate'])->name('create.application');
Route::post('/application-preview', [WebApplicationController::class, 'applicationPreviewStore'])->name('application.preview.store');
Route::get('/application-preview', [WebApplicationController::class, 'applicationPreview'])->name('application.preview');
Route::post('/application/submit', [WebApplicationController::class, 'applicationSubmit'])->name('application.submit');
Route::get('/your/application', [WebApplicationController::class, 'yourApplication'])->name('your.application');

//Visa Success/Gallery
Route::get('/all-gallery', [WebHomeController::class, 'all_gallery'])->name('all.gallery');
Route::get('/all-video', [WebHomeController::class, 'all_video'])->name('all.video');
Route::get('/gallery-images/{id}', [WebHomeController::class, 'gallery_images'])->name('gallery.images');

//Global Office
Route::get('/office', [WebHomeController::class, 'officeIndex'])->name('web.offices.index');

//Review
Route::get('/review', [WebHomeController::class, 'reviewIndex'])->name('web.review.index');

//Privacy & Policy
Route::get('/policy', [WebHomeController::class, 'policyIndex'])->name('web.policy.index');

//Contact-us
Route::get('/contact', [WebHomeController::class, 'contact'])->name('contact');
Route::post('/contact/store', [WebHomeController::class, 'contactStore'])->name('contact.store');

//Application Status
Route::get('/application-status',[WebHomeController::class,'status'])->name('application-status');
Route::post('/application-status', [WebHomeController::class, 'checkStatus']); // Handle form submission

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
        Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
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

        //Application-view
        Route::get('/application-view', [ApplicationController::class, 'applicationView'])->name('admin.application.view');
        Route::get('/application-view-details/{id}', [ApplicationController::class, 'applicationViewDetails'])->name('admin.application.view.details');
        Route::get('/application/approve/{id}', [ApplicationController::class, 'approve'])->name('admin.application.approve');
        Route::get('/application/reject/{id}', [ApplicationController::class, 'reject'])->name('admin.application.reject');

      //Contact(Send Message)
        Route::get('/contact',[ContactController::class,'viewMessage'])->name('admin.view.message');
        Route::get('/contact/view/{id}',[ContactController::class,'viewMessageDetails'])->name('admin.view.message.details');

        //Review
        //What Customers are Saying
        Route::get('/review', [ReviewController::class, 'index'])->name('admin.review.index');
        Route::post('/review/store', [ReviewController::class, 'store'])->name('admin.review.store');
        Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->name('admin.review.edit');
        Route::get('/review/view/{id}', [ReviewController::class, 'view'])->name('admin.review.view');
        Route::put('/review/update/{id}', [ReviewController::class, 'update'])->name('admin.review.update');
        Route::get('/review/destroy/{id}', [ReviewController::class, 'destroy'])->name('admin.review.destroy');

        //Global Office
        Route::get('/offices', [GlobalOfficeController::class, 'index'])->name('admin.offices.index');
        Route::post('/offices/store', [GlobalOfficeController::class, 'store'])->name('admin.offices.store');
        Route::get('/offices/edit/{id}', [GlobalOfficeController::class, 'edit'])->name('admin.offices.edit');
        Route::put('/offices/update/{id}', [GlobalOfficeController::class, 'update'])->name('admin.offices.update');
        Route::get('/offices/destroy/{id}', [GlobalOfficeController::class, 'destroy'])->name('admin.offices.destroy');

        //admin logout
        Route::get('/logout', [AuthController::class, 'adminLogout'])->name('logout');
    });
});
