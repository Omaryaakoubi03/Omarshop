<?php

use App\Http\Controllers\PaypelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackorderController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/log', function () {
    return view('welcome');
});


Route::controller(\App\Http\Controllers\HomeController::class)->group(function (){
    Route::get('/','Index')->name('home');

});
Route:: controller(\App\Http\Controllers\ClientController::class)->group(function (){
    Route::get('/category/{id}/{slug}','CategoryPage')->name('categorypage');
    Route::get('/details-product/{id}/{slug}','OmarshopProduct')->name('omarshopproduct');
    Route::get('/TrackOrder','NewRelease')->name('newrelease')->middleware('auth');


});
Route::post('/TrackOrder/send',[TrackorderController::class ,'sendTrackorder'])->name('sendtrackorder')->middleware('auth');

Route::middleware(['auth','role:user'])->group(function (){




    Route:: controller(\App\Http\Controllers\ClientController::class)->group(function (){
        Route::get('/checkout','Checkout')->name('checkout');
        Route::post('/add-to-cart/','AddProductToCart')->name('addproducttocart');
        Route::get('/add-product-to-cart','AddToCart')->name('addtocart');
        Route::get('/shppingadresse','GetSppingAdrese')->name('sppingadresse');
        Route::post('/add-shpping-adresse','AddSppingAdrese')->name('addshppingadresse');
        Route::post('/place-order','PlaceOrder')->name('placeorder');


        Route::get('/user-profile','UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders','PendingOrders')->name('pendingordrs');

        Route::get('/user-profile/pending-orders/pyment',"Payment")->name('pyment');
        Route::get('/user-profile/pending-orders/cancel',"Cancel")->name('pyment.cancel');
        Route::get('/user-profile/pending-orders/pyment/sucses',"Success")->name('payment.sucses');


        Route::get('/user-profile/history','History')->name('history');
        Route::get('/Cantact-me','TodaysDeal')->name('todaysdeal');
        Route::post('/Cantact-me/message','Createmessage')->name('todaysdealmessage');





        Route::get('/custom-service','CustomService')->name('customservice');
        Route::get('/remove-cart/{id}','RemovCart')->name('removcart');
        Route::get('/logout','Logout')->name('logoutt');

    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(\App\Http\Controllers\Admin\DshboardController::class)->group(function (){
        Route::get('admin/dashboard','Index')->name('admindashboard');
    });
    Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function (){
        Route::get('admin/all-category','Index')->name('allcategory');
        Route::get('admin/add-category','AddCategory')->name('addcategory');
        Route::post('admin/store-category','StoreCategory')->name('storecategory');
        Route::get('admin/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('admin/update-category','UpdateCategory')->name('updatecategory');
        Route::get('admin/delete-category/{id}','DeleteCategory')->name('deletecategory');
    });
    Route::controller(\App\Http\Controllers\Admin\SubCategoryController::class)->group(function (){
        Route::get('admin/all-subcategory','Index')->name('allsubcategory');
        Route::get('admin/add-subcategory','AddsubCategory')->name('addsubcategory');
        Route::post('admin/store-subcategory','StoresubCategory')->name('storesubcategory');
        Route::get('admin/edit-subcategory/{id}','EditsubCategory')->name('editsubcategory');
        Route::post('admin/update-subcategory','UpdatesubCategory')->name('updatesubcategory');
        Route::get('admin/delete-subcategory/{id}','DeletesubCategory')->name('deletesubcategory');
    });
    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function (){
        Route::get('admin/all-products','Index')->name('allproducts');
        Route::get('admin/add-product','AddProduct')->name('addproduct');
        Route::post('admin/store-product','StoreProduct')->name('storeproduct');
        Route::get('admin/edit-imageproduct/{id}','EditimageProduct')->name('editproductiiimage');
        Route::post('admin/update-imageproduct','UpadteImageProduct')->name('upadteimageproduct');
        Route::get('admin/editt-product/{id}','EditProduct')->name('editeproduct');
        Route::post('admin/update-product','UpadteProduct')->name('updateproduct');
        Route::get('admin/delete-product/{id}','DeleteProduct')->name('deletproduct');


    });
    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function (){
        Route::get('admin/pending-order','Index')->name('pendingorder');
        Route::get('admin/pending-order{id}/','DeleteOrders')->name('deleteorder');
        Route::get('admin/all-orders/','allorders')->name('allorders');

        Route::get('admin/message/','Showmessage')->name('Showmessage');



    });
});
 Route::get('auth/google',[\App\Http\Controllers\GoogleAuthController::class,'redirect'])->name('google_auth');
 Route::get('auth/google/call-back',[\App\Http\Controllers\GoogleAuthController::class,'callbackgoogle']);
require __DIR__.'/auth.php';
