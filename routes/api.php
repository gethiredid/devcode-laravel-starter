<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

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

Route::get('hello', function () {
    return response()->json([
        'message' => 'Hello world'
    ]);
});

// Ganti handler dibawah untuk menggunakan model laravel untuk mendapatkan data ke db
Route::get('/contacts', function () {
    return response()->json([
        'status' => 'Success',
        'data' => session('contacts', []),
    ]);
});

// Ganti handler dibawah untuk menggunakan model laravel untuk menyimpan data ke db
Route::post('/contacts', function (Request $request) {
    $newContact = $request->all();
    $contacts = session('contacts', []);
    $id = count($contacts) + 1;
    $newContact['id'] = $id;
    array_push($contacts, $newContact);
    session(['contacts' => $contacts]);
    $response = response()->json([
        'message' => 'Contact created',
        'status' => 'Success',
        'data' => $newContact,
    ]);
    return $response;
});
