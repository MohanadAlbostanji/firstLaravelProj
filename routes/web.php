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
    $data = [];
    $data['id'] = 181026;
    $data['name'] = 'Mohanad Albustanji';
    $data['age'] = 21;

    $obj = new stdClass();
    // $obj -> name = 'Mohanad Obj';
    // $obj -> id = '21 Obj';
    // $obj -> gender = 'Male';

    return view('welcome', $data, compact('obj')) ;
});

Route::get('/test1', function () {
    return "Mohanad Albustanji";
})  -> name('test1') ;

Route::get('/land', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('aboutUs');
});

Route::get('/auth', function () {
    return view('layouts.app');
});

Route:: get('first', 'App\Http\Controllers\FirstController@showString');
// OR
Route::group(['namespace' => 'App\Http\Controllers'], function (){
    Route:: get('first1', 'FirstController@showString');
});

Route::resource('news','App\Http\Controllers\NewsController');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') -> middleware('verified');
