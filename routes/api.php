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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Uncomment baris dibawah ini untuk membuat api /hello
Route::get('hello', function () {
    return response()->json([
        'message' => 'Hello world'
    ]);
});

Route::get('/contacts', function () {
    return response()->json([
        'status' => 'Success',
        'items' => session('contacts'),
    ]);
});

Route::post('/contacts', function (Request $request) {
    $newContact = $request->all();
    $contacts = session('contacts', []);
    array_push($contacts, $newContact);
    session(['contacts' => $contacts]);
    return response()->json([
        'message' => 'Contact created',
        'status' => 'Success',
        'items' => $newContact,
    ]);
});