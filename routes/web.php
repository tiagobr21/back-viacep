<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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
    return('<h1>Welcome</h1>');
});

Route::prefix('viacep')->group(function(){

    Route::get('/obtercep',[App\Http\Controllers\viacepController::class,'obtercep']);

    Route::get('/buscacep',[App\Http\Controllers\viacepController::class,'buscacep']);
    
});

Route::prefix('user')->group(function(){

    Route::get('/listall',[App\Http\Controllers\usersController::class,'getAllUsers']);
        
    Route::get('/{id}',[App\Http\Controllers\usersController::class,'getSingleUser']);

    Route::get('/create',[App\Http\Controllers\usersController::class,'createUsers']);

    Route::get('/delete/{id}',[App\Http\Controllers\usersController::class,'deleteUsers']);

    Route::get('/update/{id}',[App\Http\Controllers\usersController::class,'updateUsers']);


});