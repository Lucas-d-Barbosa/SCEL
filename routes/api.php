<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FornecedorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("/v1")->group(
    function(){
        Route::resource("/fornecedores", "App\Http\Controllers\FornecedorController");
        
    }
);  