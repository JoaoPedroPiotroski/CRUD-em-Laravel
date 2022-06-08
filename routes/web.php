<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartaController;
use App\Http\Controllers\CartasController;
use App\Http\Controllers\DatabaseController;

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
    return view('index');
})->name('start');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/cartas', CartasController::class, 'index')->name('results');

Route::get('/minicard', function() {
    return view('layouts.minicard');
})->name('insMinicard');
//Route::get('/minicard', [cartaController::class, 'inserirMinicard'])->name('insMinicard');

Route::get('/create', [cartaController::class, 'criar'])->name('criar');

//Route::get('/carddetail/${id?}', [cartaController::class, 'detail'])->name('detalharCarta');
//Route::get('/insertdb', [cartaController::class, 'inserirCarta'])->name('inserircarta');
//Route::resource('banco', DatabaseController::class);
Route::get('/deletarcarta/${id}', [cartaController::class, 'deletarCarta'])->name('delcard')->middleware('auth');
Route::get('/editarcarta/${id}', [cartaController::class, 'editarCarta'])->name('editcard')->middleware('auth');
//Route::get('/updatecarta/{$request}{$id}', [cartaController::class, 'update'])->name('updatecard')->middleware('auth');
Route::get('/criarcarta/', [cartaController::class, 'inserirCarta'])->name('criarCarta')->middleware('auth');
Route::resource('cartas', CartasController::class, ['names' => [
    'index' => 'results',
    'show' => 'detalharCarta'
]])->except(['update', 'edit', 'destroy']);
Route::resource('cartas', CartasController::class)->only('update')->middleware('auth');

//Route::resource('banco', DatabaseController::class, 'inserircarta');
//Route::resource('banco', DatabaseController::class, ['only' => ['create', 'store', 'edit', 'update', 'destroy']])->middleware(['auth']);
//Route::resource('banco', DatabaseController::class, ['only' => ['index',  'show']]);
