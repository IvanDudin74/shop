<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::group(['middleware' => 'api', 'prefix' => '/auth'], function ($router) {
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('/me', [\App\Http\Controllers\AuthController::class, 'me']);

    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::get('/account', \App\Http\Controllers\API\User\ShowController::class);
        Route::get('/my_orders', \App\Http\Controllers\API\Order\IndexController::class);
        Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);
        Route::post('/reviews', \App\Http\Controllers\API\Review\StoreController::class);
        Route::delete('/reviews/{review}', \App\Http\Controllers\API\Review\DeleteController::class);
    });
});

//Route::post('/auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->middleware('api');

Route::group(['prefix' => '/products'], function () {
    Route::post('/', \App\Http\Controllers\API\Product\IndexController::class);
    Route::get('/filters', \App\Http\Controllers\API\Product\FilterListController::class);
    Route::get('/{product}', \App\Http\Controllers\API\Product\ShowController::class);
});


Route::post('/users', \App\Http\Controllers\API\User\StoreController::class);
Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);

Route::post('/reviews', \App\Http\Controllers\API\Review\IndexController::class);
