<?php

namespace App\Http\Controllers\Api;

use App\Enums\ExpenseStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\RejectExpenseRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller {
	
	public function index(Request $request) {
		$query = Expense::query();
		
		if ( $request->filled('filter.status') ) {
			$query->where('status', $request->input('filter.status'));
		}
		
		$expenses = $query->latest()->get();
		
		return ExpenseResource::collection($expenses);
	}
	
	public function store(StoreExpenseRequest $request) {
		$expense = $request->user()->expenses()->create($request->validated());
		
		return new ExpenseResource($expense);
	}
	
	public function approve(Request $request, Expense $expense) {
		if ( $expense->status !== ExpenseStatus::PENDING ) {
			abort(422, 'Can only approve pending expenses.');
		}
		
		$expense->update([
			'status'                 => ExpenseStatus::GOEDGEKEURD,
			'afgekeurd_omschrijving' => null,
		]);
		
		return response()->json([
			'message' => 'Expense approved successfully.',
			'data'    => new ExpenseResource($expense),
		]);
	}
	
	public function reject(RejectExpenseRequest $request, Expense $expense) {
		if ( $expense->status !== ExpenseStatus::PENDING ) {
			abort(422, 'Can only reject pending expenses.');
		}
		
		$expense->update([
			'status'                 => ExpenseStatus::AFGEKEURD,
			'afgekeurd_omschrijving' => $request->validated()['afgekeurd_omschrijving'],
		]);
		
		return response()->json([
			'message' => 'Expense rejected successfully.',
			'data'    => new ExpenseResource($expense),
		]);
	}
	
}
