<?php

use App\Http\Controllers\CartaController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\DecksController;
use App\Http\Controllers\MisDecksController;
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
    return redirect('home');
});
/*
route::get('cartas', [
    CartaController::class, 'index'
])->name('cartas.index');

route::get('cartas/{carta}', [
    CartaController::class, 'show'
])->name('cartas.show');*/

Route::group(['middleware' => ['auth']], function(){

    Route::get('/misdecks', [App\Http\Controllers\MisDecksController::class, 'lista'])->name('misdecks');
    Route::get('/creador', [App\Http\Controllers\MisDecksController::class, 'creador'])->name('creador');
    Route::resource('decks', DecksController::class);

    Route::group(['middleware' => ['is_admin']], function(){
       Route::resource('cartas', CartaController::class);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/biblioteca-c', [App\Http\Controllers\BibliotecaController::class, 'cartas'])->name('biblioteca-c');
Route::get('/biblioteca-d', [App\Http\Controllers\BibliotecaController::class, 'decks'])->name('biblioteca-d');


