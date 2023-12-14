<?php

use App\Http\Controllers\Backoffice\Script\AllScriptGetController;
use App\Http\Controllers\Bank\Account\CreateController;
use App\Http\Controllers\Bank\Account\DeleteByArrayController;
use App\Http\Controllers\Bank\Account\IndexController;
use App\Http\Controllers\Bank\Account\ShowController;
use App\Http\Controllers\Bank\AccountController;
use App\Http\Controllers\Bank\TransactionController;
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

// Route::delete('/accounts', [AccountController::class, 'deleteByArray']);
Route::get('/accounts', IndexController::class, '__invoke');
Route::get('/accounts/{id}', ShowController::class, '__invoke');
Route::post('/accounts', CreateController::class, '__invoke');
Route::delete('/accounts', DeleteByArrayController::class, '__invoke');


Route::delete('/accounts/{id}/destroy', [AccountController::class, 'destroy']);
Route::post('/accounts/import', [AccountController::class, 'importTransactions']);


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
