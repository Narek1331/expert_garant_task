<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CDocumentController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});

Route::group([

    'prefix' => 'document'

], function ($router) {

    Route::get('/', [CDocumentController::class,'index']);
    Route::post('/', [CDocumentController::class,'store']);
    Route::put('/{document_id}', [CDocumentController::class,'edit'])->where('id', '[0-9]+');
    Route::delete('/{document_id}', [CDocumentController::class,'destroy'])->where('id', '[0-9]+');

});
