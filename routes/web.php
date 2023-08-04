<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


//Route::resource('users', 'UserController')->middleware('auth');
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('customers', App\Http\Controllers\CustomerController::class);


Route::resource('withdraws', App\Http\Controllers\WithdrawController::class);


Route::resource('withdrawLogs', App\Http\Controllers\WithdrawLogController::class);


Route::resource('deposits', App\Http\Controllers\DepositController::class);


Route::resource('depositDetails', App\Http\Controllers\DepositDetailController::class);


Route::resource('gameTypes', App\Http\Controllers\GameTypeController::class);


Route::resource('gameDetails', App\Http\Controllers\GameDetailController::class);


Route::resource('cryptos', App\Http\Controllers\CryptoController::class);


Route::resource('cryptoPrices', App\Http\Controllers\CryptoPriceController::class);


Route::resource('depositTickets', App\Http\Controllers\DepositTicketController::class);


Route::resource('depositTicketDetails', App\Http\Controllers\DepositTicketDetailController::class);


Route::resource('withdrawTickets', App\Http\Controllers\WithdrawTicketController::class);


Route::resource('tickets', App\Http\Controllers\TicketController::class);


Route::resource('ticketLogs', App\Http\Controllers\TicketLogController::class);


Route::resource('customerBalanceLogs', App\Http\Controllers\CustomerBalanceLogController::class);
