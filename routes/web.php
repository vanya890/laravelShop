<?php

use Illuminate\Support\Facades\Route;

Route::get('/','MainController@index')->name('index');

Route::get('/sbros','MainController@sbros')->name('sbros');



Route::get('/categories','MainController@categories')->name('categories');
Route::get('/category/{category}','MainController@category')->name('category');

Route::get(
    '/category/{category}/{product?}',
    'MainController@product')->name('product'
);

Route::group([
    'prefix' => 'basket'
],function (){
    Route::group(['middleware' => 'basket_not_empty'],function (){
        Route::get('/','BasketController@basket')->name('basket');
        Route::get('/place','BasketController@basketPlace')->name('basket-place');
        Route::post('/confirm','BasketController@basketConfirm')->name('basket-confirm');
    });
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
});

Auth::routes([
    'reset'=> false,
    'confirm'=> false,
    'verify'=> false,
]);
Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'Admin'
],function (){
    Route::group(['middleware' => 'is_admin'], function (){
        Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'orders'])->name('home');
        Route::get('/orders/{orderId}', [App\Http\Controllers\Admin\OrderController::class, 'order'])->name('adminOrder');
        Route::get('/orders/delete/{orderId}', [App\Http\Controllers\Admin\OrderController::class, 'orderDelete'])
            ->name('adminOrderDelete');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
    });
});


