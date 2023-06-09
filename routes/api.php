<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\StatusController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/registrar', [RegisterController::class, 'registrar']);

Route::middleware('jwt.auth')->group(function ($route) {
    $route->post('/logout', [AuthController::class, 'logout']);
    $route->post('/me', [AuthController::class, 'me']);
    $route->post('/refresh', [AuthController::class, 'refresh']);

    $route->get('/tarefas/TarefasEmAndamentoSeparadaPorStatus', [TarefasController::class, 'TarefasEmAndamentoSeparadaPorStatus']);
    $route->get('/tarefas/TarefasConcluidaSeparadaPorStatus', [TarefasController::class, 'TarefasConcluidaSeparadaPorStatus']);
    $route->get('/redis', [RedisController::class, 'index'])->name('redis.index');
});

Route::apiResource('projetos', ProjetosController::class)->middleware('jwt.auth');
Route::apiResource('tarefas', TarefasController::class)->middleware('jwt.auth');
Route::apiResource('status', StatusController::class)->middleware('jwt.auth');
