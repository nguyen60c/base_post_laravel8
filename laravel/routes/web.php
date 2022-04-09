<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::group(["namespace"=>"App\Http\Controllers"],
function(){

    /**
     * Home Routes
     */
    Route::get("/", [HomeController::class,"index"])->name("home.index");

    Route::group(["middleware"=>["guest"]],
    function(){
        /**
         * Register Routes
         */
        Route::get("/register",[RegisterController::class,"show"])->name("register.show");
        Route::post("/register",[RegisterController::class,"register"])->name("register.perform");

        /**
         * Login Routes
         */
        Route::get("/login",[LoginController::class,"show"])->name("login.show");
        Route::post("/login",[LoginController::class,"login"])->name("login.perform");
    });

    Route::group(["middleware"=>["auth"]],
    function(){
        
        /**
         * Logout Routes
         */
        Route::get("/logout", [LogoutController::class,"perform"])->name("logout.perform");
    });
});