<?php

use App\Http\Controllers\DocumentController;
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

Route::group(['prefix' => '/v1'], function () {
    Route::get('document/{document}', [DocumentController::class, 'showDocument']);
    Route::post('document', [DocumentController::class, 'createDraftDocument']);
    Route::patch('document/{document}', [DocumentController::class, 'editDocument']);
    Route::post('document/{document}/publish', [DocumentController::class, 'publishDocument']);
    Route::post('documents', [DocumentController::class, 'index']);
});
