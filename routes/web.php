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
});

Route::post('/home', 'TradingAccountController@createTradingAccount');

Route::get('/home', function () {
    $session_id = Auth::user()->id;
    $lists = ShareMarketGame\Share::all();
    $lists2 = ShareMarketGame\TradingAccount::where('user_id' , '=', $session_id)->get();
    $lists3 = ShareMarketGame\TradingAccount::all();
    return view('home', compact('lists', 'lists2', 'lists3'));
});

Route::post('/delete', 'TradingAccountController@deleteTradingAccount');

Route::get('/delete', function () {
    $session_id = Auth::user()->id;
    $lists = ShareMarketGame\Share::all();
    $lists2 = ShareMarketGame\TradingAccount::where('user_id' , '=', $session_id)->get();
    $lists3 = ShareMarketGame\TradingAccount::all();
    return view('delete', compact('lists', 'lists2', 'lists3'));
});

Route::get('/trading_account/{nickname}', function ($nickname) {
    $lists = DB::table('Transactions')->where('nickname',$nickname)->get();
    $stock = ShareMarketGame\Share::all();
    return view('history', compact('lists','stock'));
});

Route::get('/home/{code}', function ($code) {
    $session_id =  \Auth::user()->id;
    $accounts = ShareMarketGame\TradingAccount::where('user_id' , '=', $session_id)->get();
    $list = DB::table('shares')->where('code',$code)->first();
    $stock = ShareMarketGame\Holding::all();
    return view('dashboard.show', compact('list', 'accounts', 'stock'));
});

Route::get('/nickname', function () {
    $session_id = \Auth::user()->id;
    $lists2 = ShareMarketGame\TradingAccount::where('user_id' , '=', $session_id)->get();
    $lists3 = ShareMarketGame\TradingAccount::all();
    return view('nickname', compact('lists2', 'lists3'));
});

Route::post('/nickname', 'TradingAccountController@changeNickname');

Route::get('/resetpassword', function () {
    return view('auth.passwords.email');
});

Route::get('/reg-tradeaccount', function () {
    $lists = ShareMarketGame\Share::all();
    return view('tradeAccount', compact('lists'));
});

Route::get('/general-settings', function () {
    $lists = ShareMarketGame\Share::all();
    return view('settings', compact('lists'));
});

Route::get('/transfer', function () {
    $session_id = \Auth::user()->id;
    $lists2 = ShareMarketGame\TradingAccount::where('user_id' , '=', $session_id)->get();
    $lists3 = ShareMarketGame\TradingAccount::all();
    return view('transfer', compact('lists2', 'lists3'));
});

Route::post('/transfer', 'TradingAccountController@transferFunds');

Route::get('/search', function () {
    $lists = ShareMarketGame\Share::all();
    return view('dashboard.search', compact('lists'));
});

Route::get('/leaderboard', function (){
    $boards = ShareMarketGame\Leader::orderBy('place')->get();
    $lists3 = ShareMarketGame\TradingAccount::all();
    return view('leaderboard', compact('boards', 'lists3'));
});

Route::post('/buy', 'HoldingController@buyShares');

Auth::routes();
