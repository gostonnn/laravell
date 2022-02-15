<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SzalamiController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware"=>[ "auth:sanctum" ]],function(){
    Route::post("/logout",[AuthController::class,"logout"]);//oke
    Route::post("/szalami",[SzalamiController::class,"store"]);
    Route::put("/szalami/{data}",[SzalamiController::class,"update"]);//oke
    Route::delete("/szalami/delete/{id}",[SzalamiController::class,"destroy"]);//oke
});

Route::post("/register",[AuthController::class,"signup"]);//oke
Route::post("/login",[AuthController::class,"signin"]);//oke
Route::get( "/szalami",[SzalamiController::class,"index" ]);//oke
Route::get("/szalami/{id}",[SzalamiController::class,"show"]);//oke
Route::get("/szalami/search/{nev}", [SzalamiController::class, "search"]);//oke
Route::get("/szalami/filter/{tipus}", [SzalamiController::class, "filter"]);//oke
