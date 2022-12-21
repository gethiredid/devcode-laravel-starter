<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\contact;

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

Route::get('/contacts', function () {
    $contacts = contact::all();
    return response()->json([
        'status' => 'Success',
        'data' => $contacts,
    ]);
});

// TODO: tambahkan validasi duplicate dan blank
Route::post('/contacts', function (Request $request) {
    $newContact = $request->all();
    $contact = new contact();
    $contact->full_name = $newContact['full_name'];
    $contact->phone_number = $newContact['phone_number'];
    $contact->email = $newContact['email'];
    $contact->save();
    $response = response()->json([
        'message' => 'Contact created',
        'status' => 'Success',
        'data' => $contact,
    ]);
    return $response;
});

// TODO: tambahkan validasi not found dan blank
Route::put('/contacts/{contact}', function (Request $request, Contact $contact) {
    $newContact = $request->all();
    if (isset($newContact['full_name'])) {
        $contact->full_name = $newContact['full_name'];
    }
    if (isset($newContact['phone_number'])) {
        $contact->phone_number = $newContact['phone_number'];
    }
    if (isset($newContact['email'])) {
        $contact->email = $newContact['email'];
    }
    $contact->save();
    $response = response()->json([
        'message' => 'Contact updated',
        'status' => 'Success',
        'data' => $contact,
    ]);
    return $response;
});

// TODO: tambahkan validasi not found
Route::delete('/contacts/{contact}', function (Contact $contact) {
    $contact->delete();
    $response = response()->json([
        'message' => 'Contact deleted',
        'status' => 'Success',
    ]);
    return $response;
});
