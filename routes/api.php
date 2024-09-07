<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblPoliticoController;
use App\Http\Controllers\TblPartidoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function() {
    return response()->json(["Sucesso" => true]);//funcionou
});

Route::prefix('politico')->group(function () {
    Route::get('/', [TblPoliticoController::class, 'index']);//funcionou
    Route::get('/{idpolitico}', [TblPoliticoController::class, 'show']);//funcionou
    Route::post('/', [TblPoliticoController::class, 'store']);//funcionou
    Route::put('/{idpolitico}', [TblPoliticoController::class, 'update']);//funcionou
    Route::delete('/{idpolitico}', [TblPoliticoController::class, 'destroy']);//funcionou
});

Route::prefix('partido')->group(function () {
    Route::get('/', [TblPartidoController::class, 'index']);//funcionou
    Route::get('/{idpartido}', [TblPartidoController::class, 'show']);//funcionou
    Route::post('/', [TblPartidoController::class, 'store']);//funcionou
    Route::put('/{idpartido}', [TblPartidoController::class, 'update']);//funcionou
    Route::delete('/{idpartido}', [TblPartidoController::class, 'destroy']);//funcionou
});
