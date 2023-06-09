<?php

use App\Http\Controllers\ProjetosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/registrar', [RegisterController::class, 'registrar']);
Route::get('/projetos', [ProjetosController::class, 'index']);
