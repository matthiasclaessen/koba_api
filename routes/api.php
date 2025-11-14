<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/api/expenses?filter[status]=pending', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/api/expenses', function (Request $request) {});

Route::patch('/api/expenses/{id}/approve', function (Request $request, $id) {});
Route::patch('/api/expenses/{id}/reject', function (Request $request, $id) {});


