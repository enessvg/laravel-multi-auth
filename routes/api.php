<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', function(Request $request){
    // Authenticate a regular user
    if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // User is logged in
        // User model
    }

    // Authenticate an Customer
    if (auth()->guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // Customer is logged in
        // Customer model
    }
});

//Protect Routes:
Route::middleware(['auth:web'])->group(function () {
    // Routes accessible to regular users
});

Route::middleware(['auth:customer'])->group(function () {
    // Routes accessible to administrators
});