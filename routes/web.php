<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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


// chỉ dành cho login
Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'Auth\LoginController@postLogin']);

Route::get('/logout',['as'=>'logout','uses'=>'Auth\LoginController@getLogout']);

// Dùng để bảo vệ các đường link, chỉ cần cho vào đây
Route::middleware(['auth'])->group(function(){
    // Phải login mới vào admin được
    Route::get('/test','TestController@index')->name('route_BackEnd_test_index');
    Route::match(['get','post'], 'test/add','TestController@add')->name('route_BackEnd_test_add');
});