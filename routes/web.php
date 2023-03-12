<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controllers;
  
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.student'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [AuthController::class, 'dashboard']); 
 
 


 


Route::post('deposite', [AuthController::class, 'deposite'])->name('add.deposite'); //done
Route::post('withdraw', [AuthController::class, 'withdraw'])->name('add.withdraw'); //done
Route::POST('statement', [AuthController::class, 'statement'])->name('add.statement'); //Done

Route::post('/daterange/fetch_data', [AuthController::class, 'fetch_data'])->name('daterange.fetch_data');

Route::get('statement_list', [AuthController::class, 'statement_list'])->name('statement_list'); //Done

// Route::POST('statement_list', [AuthController::class, 'statement_list'])->name('statement_list'); //Done

 