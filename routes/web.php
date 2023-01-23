<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('welcome');
// });

//pessoa
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/createUser', [HomeController::class, 'createUser'])->name('createUser');
Route::get('/editUser/{id}', [HomeController::class, 'editUser'])->name('editUser');
Route::post('/editUserAction', [HomeController::class, 'editUserAction'])->name('editUserAction');
Route::get('/deleteUser/{id}', [HomeController::class, 'deleteUserAction'])->name('deleteUser');

//conta
Route::get('/conta', [AccountController::class, 'index'])->name('conta');
Route::post('/createAccount', [AccountController::class, 'createAccount'])->name('createAccount');
Route::get('/editAccount/{id}', [AccountController::class, 'editAccount'])->name('editAccount');
Route::post('/editAccountAction', [AccountController::class, 'editAccountAction'])->name('editAccountAction');
Route::get('/deleteAccount/{id}', [AccountController::class, 'deleteAccountAction'])->name('deleteAccount');

//movimentação
Route::get('/movimentacao', [TransactionController::class, 'index'])->name('movimentacao');
Route::post('/createMovimentacao', [TransactionController::class, 'createMovimentacao'])->name('createMovimentacao');

//api to get all contas from specific user id
Route::get('/contas/{pessoa_id}', [TransactionController::class, 'getContasByPessoaId']);

//api to get all movimentacoes from specific conta id
Route::get('/movimentacoes/{conta_id}', [TransactionController::class, 'getMovimentacoesByContaId']);

Route::get('/migrate', function() {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return 'Migrations e seeders executados com sucesso.';
});