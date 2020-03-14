<?php

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

Route::prefix('users')->middleware('auth')->group(function() {
    Route::get('users', function(Request $request) {

        return 'Hello';
    });
});

Route::middleware('auth')->group(function() {
    Route::get('test', function(Request $request) {

        // $connection = mysqli_connect('localhost','max','maxpass123','hypertube');
        echo env('DB_USERNAME');
        return response()->json([
            'data' => 'Some json data'
        ]);
    })->name('test.huest');
});

Route::get('/test2', function (Request $request) {
    return response()->json(['hello' => ' ma friend'], 201);
});
