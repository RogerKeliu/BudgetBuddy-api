<?php

use App\Http\Controllers\Backoffice\Script\AllScriptGetController;
use App\Http\Controllers\Bank\AccountController;
use App\Http\Controllers\Bank\TransactionController;
use App\Http\Controllers\ScriptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
|                               ACCOUNTS
|--------------------------------------------------------------------------
*/

Route::delete('/accounts', [AccountController::class, 'deleteByArray']);
Route::delete('/accounts/{id}/destroy', [AccountController::class, 'destroy']);
Route::post('/accounts/import', [AccountController::class, 'importTransactions']);
Route::resource('/accounts', AccountController::class)->except(['destroy']);


/*
|--------------------------------------------------------------------------
|                               TRANSACTIONS
|--------------------------------------------------------------------------
*/
Route::resource('/transactions', TransactionController::class)->except(['delete', 'destroy']);
Route::delete('/transactions/{id}', [TransactionController::class, 'delete']);
Route::delete('/transactions/{id}/destroy', [TransactionController::class, 'destroy']);



/*
|--------------------------------------------------------------------------
|                               TRANSACTION TYPES
|--------------------------------------------------------------------------
*/
Route::resource('/transactionTypes', TransactionTypeController::class)->except(['delete', 'destroy']);
Route::delete('/transactionTypes/{id}', [TransactionTypeController::class, 'delete']);
Route::delete('/transactionTypes/{id}/destroy', [TransactionTypeController::class, 'destroy']);



Route::get('v2/scripts', [AllScriptGetController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
