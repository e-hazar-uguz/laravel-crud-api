<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\BillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Api'], function() {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('bills', BillController::class);

    Route::post('bills/multiple', ['uses' => 'BillController@multipleBillStore']);
});

//customera ait fatular var ise onları listeler
//http://localhost:8000/api/customers/1?includeBills=true

//customerda filtreleme işlemi yapmak için kullanılır
//http://localhost:8000/api/customers?postalCode[gt]=30000&type[eq]=B

