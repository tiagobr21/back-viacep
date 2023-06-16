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
    return response()->json('Work');
});


Route::prefix('viacep')->group(function(){

    Route::post('/getaddressbycep',[App\Http\Controllers\viacepController::class,'getaddressbycep']);

    Route::post('/searchcep',[App\Http\Controllers\viacepController::class,'searchcep']);
    
});


Route::prefix('user')->group(function(){

    Route::post('/create',[App\Http\Controllers\usersController::class,'createUsers']);

    Route::get('/listall',[App\Http\Controllers\usersController::class,'getAllUsers']);
        
    Route::get('/{id}',[App\Http\Controllers\usersController::class,'getSingleUser']);

    Route::delete('/delete/{id}',[App\Http\Controllers\usersController::class,'deleteUsers']);

    Route::put('/update/{id}',[App\Http\Controllers\usersController::class,'updateUsers']);

});
    
