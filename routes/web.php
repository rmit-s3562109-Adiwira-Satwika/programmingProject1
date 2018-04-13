<?php

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
<<<<<<< HEAD
    //return $lists;
});

Route::get('/home', function () {
    $lists = ShareMarketGame\Share::all();

    return view('home', compact('lists'));
    //return $lists;
});

Route::get('/dashboard/{code}', function ($code) {
    $list = DB::table('shares')->where('code',$code)->first();

    return view('dashboard.show', compact('list'));
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
=======

});

Route::get('/dashboard', function () {
    $lists = ShareMarketGame\Share::all();

    return view('dashboard.dashboard', compact('lists'));

});


Route::get('/dashboard/{code}', function ($code) {
    
    $list = DB::table('shares')->where('code',$code)->first();

    return view('dashboard.show', compact('list'));

});

Auth::routes();
>>>>>>> adding viewing stock functionality
