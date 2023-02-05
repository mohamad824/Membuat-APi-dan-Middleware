<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('products', [ProductController::class, 'index']);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['tokenaccess']], function () {
    Route::get('cities', 'CityAPIController@show_city');
  });
Route::get('products', [ProductController::class, 'index'])->middleware('product-token');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
