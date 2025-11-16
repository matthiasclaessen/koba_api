<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/expenses', [ ExpenseController::class, 'index' ]);

Route::post('/expenses', [ ExpenseController::class, 'store' ]);

Route::patch('/expenses/{id}/approve', [ ExpenseController::class, 'approve' ]);
Route::patch('/expenses/{id}/reject', [ ExpenseController::class, 'reject' ]);


