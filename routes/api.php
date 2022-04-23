<?php

use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// users
Route::post('user/create', [UserController::class, 'create']);

// friend requests
Route::post('fr/send', [FriendRequestController::class, 'send']);
Route::post('fr/cancel', [FriendRequestController::class, 'cancel']);
Route::post('fr/{friendRequest}/accept', [FriendRequestController::class, 'accept']);
Route::post('fr/delete', [FriendRequestController::class, 'delete']);
Route::get('user/{user}/fr/accepted', [FriendRequestController::class, 'get_accepted']);
Route::get('user/{user}/fr/pending', [FriendRequestController::class, 'get_pending']);
Route::delete('fr/{friendRequest}/delete', [FriendRequestController::class, 'delete']);
Route::delete('fr/{friendRequest}/cancel', [FriendRequestController::class, 'cancel']);


