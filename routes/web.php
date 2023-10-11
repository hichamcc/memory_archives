<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController; // Import the MemoController
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
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

//Route::get('/', function () {
//    return view('welcome');
//})->name('public.home');

Route::get('/info', [PublicController::class, 'info'])->name('info');
Route::get('/add_memo', [PublicController::class, 'addMemo'])->name('add_memo');
Route::get('/memo_overview', [MemoController::class, 'memoOverview'])->name('memo_overview');
Route::get('/submitted', [PublicController::class, 'submitted'])->name('submitted');

Route::get('/', [MemoController::class, 'index'])->name('public.home');

Route::post('/memos', [MemoController::class, 'store'])->name('memos.store');
Route::put('/memos/{id}', [MemoController::class, 'update'])->name('memos.update');


Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

