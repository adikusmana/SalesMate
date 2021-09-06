<?php

use App\Charts\SalesChart;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function() {
    Route::resource('/user', 'UserController');
    Route::resource('/site', 'SiteController');
    Route::resource('/department', 'DepartmentController');
    Route::resource('/subdepartment', 'SubdepartmentController');
    Route::resource('/vendor', 'VendorController');
    Route::resource('/brand', 'BrandController');
    Route::get('/upload', 'TransactionController@upload');
    Route::post('/uploadTransaction', 'TransactionController@uploadTransaction');
    Route::get('/rankingsite', 'RankingController@site');
    Route::any('/rankingsite/search', 'RankingController@siteSearch');
});

Route::resource('/profile', 'ProfileController');

Route::any('/transaction/search', 'TransactionController@search');
Route::get('/transaction', 'TransactionController@index');


Route::get('/rankingbrand', 'RankingController@brand');
Route::any('/rankingbrand/search', 'RankingController@brandSearch');

Route::get('/rankinguser', 'RankingController@user');
Route::any('/rankinguser/search', 'RankingController@userSearch');


Route::get('/rankingdepartment', 'RankingController@department');
Route::any('/rankingdepartment/search', 'RankingController@departmentSearch');

Route::get('/rankingsubdepartment', 'RankingController@subdepartment');
Route::any('/rankingsubdepartment/search', 'RankingController@subdepartmentSearch');



Route::get('get-subdepartment-list/','UserController@getSubdepartment');
Route::get('get-department-list/','UserController@getDepartment');
Route::get('get-brand-list/','UserController@getBrand');
