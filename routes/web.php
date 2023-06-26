<?php

use App\Http\Controllers\CartaController;
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
    return redirect('cartas');
});
/*
route::get('cartas', [
    CartaController::class, 'index'
])->name('cartas.index');

route::get('cartas/{carta}', [
    CartaController::class, 'show'
])->name('cartas.show');*/

Route::resource('cartas', CartaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
