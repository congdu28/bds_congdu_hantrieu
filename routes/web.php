<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BannerController;
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
    return view('client.index');
});


// chỉ dành cho login
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
// đăng xuất
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);

// Dùng để bảo vệ các đường link, chỉ cần cho vào đây
Route::middleware(['auth'])->group(function () {
    // Phải login mới vào admin được
    Route::get('/home','ClientController@index');
    Route::get('/project_font','Project_fontController@index');
    Route::get('/news_font','News_fontController@index');
    Route::get('/contact_font','Contact_fontController@index');
    //user
    Route::get('/test', 'TestController@index')->name('route_BackEnd_test_index'); // danh sách user
    Route::match(['get', 'post'], 'test/add', 'TestController@add')->name('route_BackEnd_test_add'); // thêm user
    Route::get('/test/detail/{id}', 'TestController@detail')->name('route_BackEnd_test_detail'); // show chi tiết user
    Route::post('/test/update/{id}', 'TestController@update')->name('route_BackEnd_test_update');    // cập nhật

    // category
    Route::match(['get', 'post'], 'category/addCategory', 'CategoryController@addCategory')->name('route_BackEnd_category_addCategory'); // thêm cate
    Route::get('/category/category', 'CategoryController@listCategory')->name('route_BackEnd_category_listCategory'); // danh sách category
    Route::get('/category/detail/{id}', 'CategoryController@detailCategory')->name('route_BackEnd_category_detailCategory'); // show chi tiết cate
    Route::post('/category/update/{id}', 'CategoryController@updateCategory')->name('route_BackEnd_category_updateCategory');    // cập nhật

    // news
    Route::match(['get', 'post'], 'news/addNews', 'NewsController@addNews')->name('route_BackEnd_news_addNews'); // thêm news
    Route::get('/news/news', 'NewsController@listNews')->name('route_BackEnd_news_listNews'); // danh sách news
    Route::get('/news/detail/{id}', 'NewsController@detailNews')->name('route_BackEnd_news_detailNews'); // show chi tiết news
    Route::post('/news/update/{id}', 'NewsController@updateNews')->name('route_BackEnd_news_updateNews');    // cập nhật

    // project
    Route::match(['get', 'post'], 'project/addProject', 'ProjectController@addProject')->name('route_BackEnd_project_addProject'); // thêm project
    Route::get('/project/project', 'ProjectController@listProject')->name('route_BackEnd_project_listProject'); // danh sách project
    Route::get('/project/detail/{id}', 'ProjectController@detailProject')->name('route_BackEnd_project_detailProject'); // show chi tiết prj
    Route::post('/project/update/{id}', 'ProjectController@updateProject')->name('route_BackEnd_project_updateProject');    // cập nhật

    // banner
    Route::match(['get', 'post'], 'banner/addBanner', 'BannerController@addBanner')->name('route_BackEnd_banner_addBanner'); // thêm banner
    Route::get('/banner/banner', 'BannerController@listBanner')->name('route_BackEnd_banner_listBanner'); // danh sách banner
    Route::get('/banner/detail/{id}', 'BannerController@detailBanner')->name('route_BackEnd_banner_detailBanner'); // show chi tiết banner
    Route::post('/banner/update/{id}', 'BannerController@updateBanner')->name('route_BackEnd_banner_updateBanner');    // cập nhật banner
});
