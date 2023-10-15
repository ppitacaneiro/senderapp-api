<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\HickingTrailController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProvinceController;
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

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    
    Route::get('/communities',[CommunityController::class, 'index']);
    Route::get('/provinces/{idCommunity}',[ProvinceController::class, 'getProvincesByCommunityId']);
    Route::get('/municipalities/{idProvince}',[MunicipalityController::class, 'getMunicipalitiesByProvinceId']);

    Route::prefix('hicking_trails')->group(function() {
        Route::post('store',[HickingTrailController::class, 'store']);
        Route::post('search',[HickingTrailController::class, 'search']);
    });

});
