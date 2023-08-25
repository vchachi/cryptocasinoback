<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('customers', App\Http\Controllers\API\CustomerAPIController::class);


Route::resource('withdraws', App\Http\Controllers\API\WithdrawAPIController::class);


Route::resource('withdraw_logs', App\Http\Controllers\API\WithdrawLogAPIController::class);


Route::resource('deposits', App\Http\Controllers\API\DepositAPIController::class);


Route::resource('deposit_details', App\Http\Controllers\API\DepositDetailAPIController::class);


Route::resource('game_types', App\Http\Controllers\API\GameTypeAPIController::class);


Route::resource('game_details', App\Http\Controllers\API\GameDetailAPIController::class);


Route::resource('cryptos', App\Http\Controllers\API\CryptoAPIController::class);


Route::resource('crypto_prices', App\Http\Controllers\API\CryptoPriceAPIController::class);


Route::resource('deposit_tickets', App\Http\Controllers\API\DepositTicketAPIController::class);


Route::resource('deposit_ticket_details', App\Http\Controllers\API\DepositTicketDetailAPIController::class);


Route::resource('withdraw_tickets', App\Http\Controllers\API\WithdrawTicketAPIController::class);


Route::resource('tickets', App\Http\Controllers\API\TicketAPIController::class);


Route::resource('ticket_logs', App\Http\Controllers\API\TicketLogAPIController::class);


Route::resource('customer_balance_logs', App\Http\Controllers\API\CustomerBalanceLogAPIController::class);


Route::resource('game_logs', App\Http\Controllers\API\GameLogAPIController::class);


Route::resource('users', App\Http\Controllers\API\UserAPIController::class);
