<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('budgets', BudgetController::class);
Route::get('allbudgets', [BudgetController::class, 'getBudgets'])->name('budgets.all');
//Route::post('/budgets/store', [BudgetController::class, 'store']);
require __DIR__.'/auth.php';
