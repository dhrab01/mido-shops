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
//Language Translation
 Route::get('/{locale}', [App\Http\Controllers\Admin\AdminController::class, 'lang']);
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    //admin login route
    Route::match(['get','post'],'login', 'AdminController@login');
    Route::group(['middleware'=>['admin']], function(){
       //admin dashboard route
        Route::get('/dashboard','AdminController@dashboard');
        //admin logout route
        Route::match(['get','post'],'logout', 'AdminController@logout');
        //admin profile
        Route::get('/profile','AdminController@profile');
        //update profile
        // Route::post('/update-profile', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('updateProfile');
        Route::match(['get', 'post'], 'update-admin-profile', 'AdminController@updateProfile');
        //check admin password
        Route::post('/check-admin-password', 'AdminController@checkAdminPassword');
        //update admin password
        Route::match(['get','post'], 'update-admin-password', 'AdminController@profile');

        //view admins / subadmins / vendors
        Route::get('admins/{type?}', 'AdminController@admins');
        //view vendor details
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');
        //update admin status
        Route::post('update-admin-status','AdminController@updateAdminStatus');

        //vendor routes
        //vendor dashboard
        Route::get('/vendor-dashboard','VendorController@dashboard');
        //vendor details
        Route::match(['get','post'], 'update-vendor-details/{slug}', 'VendorController@updateVendorDetails');

        //sections
        Route::get('sections', 'SectionController@sections');
        //update section status
        Route::post('update-section-status','SectionController@updateSectionStatus');
        //delete section
        Route::get('delete-section/{id}','SectionController@deleteSection');


    });
    
});


require __DIR__.'/auth.php';
// Auth::routes();
// 

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// //Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


