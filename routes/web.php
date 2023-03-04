<?php

use App\Http\Controllers\Admin\CategoryController;
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
        
        //check admin password
        Route::post('/check-admin-password', 'AdminController@checkAdminPassword');
        //update admin password
        Route::match(['get','post'], 'update-admin-profile/{slug}', 'AdminController@updateProfile');

        //view admins / subadmins / vendors
        Route::get('admins/{type?}', 'AdminController@admins');
        //view vendor details
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');
        //update admin status
        Route::post('update-admin-status','AdminController@updateAdminStatus');
        //delete admin
        // Route::get('delete-admin/{id}','AdminController@deleteAdmin');
        //delete admin image
        Route::get('delete-admin-image/{id}','AdminController@deleteAdminImage');

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
        //add\edit sections
        // Route::match(['get','post'], 'add_edit_section/{id?}','SectionController@addEditSection');
        Route::post('add-section','SectionController@addSection');

        Route::get('edit_section/{id}', 'SectionController@editSection');
        Route::put('update-section', 'SectionController@updateSection');

         //brands
         Route::get('brands', 'BrandController@brands');
         //update brand status
         Route::post('update-brand-status','BrandController@updateBrandStatus');
         //delete brand
         Route::get('delete-brand/{id}','BrandController@deleteBrand');
         //add\edit brand
         Route::post('add-brand','BrandController@addBrand');
 
         Route::get('edit_brand/{id}', 'BrandController@editBrand');
         Route::put('update-brand', 'BrandController@updateBrand');

        //categories
        Route::get('categories','CategoryController@categories');
        //update category status
        Route::post('update-category-status','CategoryController@updateCategoryStatus');
        //add\edit category
        Route::match(['get','post'],'add_edit_category/{id?}','CategoryController@addEditCategory');
        Route::get('append-categories-level','CategoryController@appendCatLevel');
        //delete category
        Route::get('delete-category/{id}','CategoryController@deleteCategory');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');

        //products
        Route::get('products','ProductsController@products');
        //update product status
        Route::post('update-product-status','ProductsController@updateProductStatus');
        //update product featured
        Route::post('update-product-featured','ProductsController@updateProductFeatured');
        //show details
        Route::get('show_detail/{id}', 'ProductsController@showDetail');
        //add\edit product
        Route::match(['get','post'],'add_edit_product/{id?}','ProductsController@addEditProduct');
        //delete product
        Route::get('delete-product/{id}','ProductsController@deleteProduct');
        Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');
        //add attribute
        Route::match(['get','post'],'add_edit_attributes/{id}','ProductsController@addAttribute');
        //update attribute status
        Route::post('update-attribute-status','ProductsController@updateAttributeStatus');
        //edit attribute
        Route::match(['get','post'],'edit_attributes/{id}','ProductsController@editAttribute');

        //delete attribute
        Route::get('delete-attribute/{id}','ProductsController@deleteAttribute');
        //products images
        Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');

        Route::post('update-pro_image-status','ProductsController@updateImageStatus');
        
        Route::get('delete-pro_image/{id}','ProductsController@deleteProImage');


    });
    
});

Route::namespace('App\Http\Controllers\Frontend')->group(function(){
    Route::get('/','HomeController@index');
});

require __DIR__.'/auth.php';
// Auth::routes();
// 

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// //Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


