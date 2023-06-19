<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\XrayController;
use App\Http\Controllers\MRIController;
use App\Http\Controllers\CTController;
use App\Http\Controllers\UltrasoundController;
use App\Http\Controllers\LabTestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::middleware('auth:api')->group(function () {
    Route::post('/labtest', [LabTestController::class, 'submitLabTestForm']);
    Route::get('/welcome', [AppController::class, 'welcomeNote']);
    Route::post('/add-xray', [XrayController::class, 'addXray']);
    Route::post('/add-mri',
        [MRIController::class, 'addMRI']
    );
    Route::post('/add-ct-scan', [CTController::class, 'addCTscan']);
    Route::post('/add-ultra-sound', [UltrasoundController::class, 'addUltraSound']);
    Route::get(
        '/labtest/{id}',
        [LabTestController::class, 'getAUserLab']
    );

    Route::get(
        '/labtest',
        [LabTestController::class, 'getUserLab']
    );
});