<?php

use App\Http\Controllers\Api\ExpenseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

//Route::get('/expenses', [ ExpenseController::class, 'index' ]);
//
//Route::post('/expenses', [ ExpenseController::class, 'store' ]);
//
//Route::patch('/expenses/{id}/approve', [ ExpenseController::class, 'approve' ]);
//Route::patch('/expenses/{id}/reject', [ ExpenseController::class, 'reject' ]);

Route::middleware('auth:sanctum')->group(function () {
	Route::apiResource('expenses', ExpenseController::class)->only([ 'index', 'store', 'show' ]);
	
	Route::middleware('admin')->group(function () {
		Route::patch('expenses/{expense}/approve', [ ExpenseController::class, 'approve' ]);
		Route::patch('expenses/{expense}/reject', [ ExpenseController::class, 'reject' ]);
	});
});

// Auth
Route::post('/login', function (Request $request) {
	$request->validate([
		'email'    => 'required|email',
		'password' => 'required',
	]);
	
	$user = User::where('email', $request->email)->first();
	
	if ( ! $user || ! Hash::check($request->password, $user->password) ) {
		throw ValidationException::withMessages([
			'email' => [ 'The provided credentials are incorrect.' ],
		]);
	}
	
	$token = $user->createToken('api-token')->plainTextToken;
	
	return response()->json([
		'user'  => [
			'id'         => $user->id,
			'first_name' => $user->first_name,
			'last_name'  => $user->last_name,
			'email'      => $user->email,
			'admin'      => $user->admin,
		],
		'token' => $token,
	]);
});

Route::post('/logout', function (Request $request) {
	$request->user()->currentAccessToken()->delete();
	
	return response()->json([
		'message' => 'Logged out successfully',
	]);
})->middleware('auth:sanctum');
