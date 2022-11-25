<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\LlibreController;
use App\Http\Controllers\AutorController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DefaultController::class, 'home'])->name('home');
Route::get('/welcome', [DefaultController::class, 'welcome']);
Route::get('/exemple', [DefaultController::class, 'exemple']);

//Route for books
Route::get('/llibre/list', [LlibreController::class, 'list'])->name('llibre_list');
Route::match(['get', 'post'], '/llibre/new', [LlibreController::class, 'new'])->name('llibre_new');
Route::get('/llibre/delete/{id}', [LlibreController::class, 'delete'])->name('llibre_delete');
Route::match(['get', 'post'],'/llibre/edit/{id}', [LlibreController::class, 'edit'])->name('llibre_edit');

//Route for autors
Route::get('/autor/list', [AutorController::class, 'list'])->name('autor_list');
Route::match(['get', 'post'], '/autor/new', [AutorController::class, 'new'])->name('autor_new');
Route::get('/autor/delete/{id}', [AutorController::class, 'delete'])->name('autor_delete');
Route::match(['get', 'post'],'/autor/edit/{id}', [AutorController::class, 'edit'])->name('autor_edit');

//Cookie
Route::get('/default/esborrarCookie', [DefaultController::class, 'esborrarCookie'])->name('default_esborrarCookie');
