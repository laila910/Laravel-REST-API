<?php

use Database\Seeders\CustomerSeeder;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api/V1
//localhost:8000/api/v1/customers ---> for index all users
//localhost:8000/api/v1/invoices  ---> for index all invoices
//localhost:8000/api/v1/customers/1 --> for show one customer :) id is change as we wish 
Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1','middleware'=>'auth:sanctum'],function(){
    Route::apiResource('customers',CustomerController::class);
    Route::apiResource('invoices',InvoiceController::class); 
    //firefox, it Receives a JSON response, It will automatically parse it into something that is halfway readable.
    Route::post('invoices/bulk',['uses'=>'InvoiceController@bulkStore']);
});