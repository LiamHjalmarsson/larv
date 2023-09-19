<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
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

Route::get("", fn () => to_route("user.index"));

Route::resource("auth", AuthController::class);

Route::resource("user", UserController::class);

Route::post("/user/{user:username}/follow", [FollowController::class, "store"]);
Route::post("/user/{user:username}/unfollow", [FollowController::class, "destroy"]);

Route::resource("game", GameController::class);
