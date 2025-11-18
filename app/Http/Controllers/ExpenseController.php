<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller {
	
	public function index(Request $request) {
		$query = Expense::query();
		
		// Handle filter[status] parameter
		if ( $request->has('filter.status') ) {
			$query->where('status', $request->input('filter.status'));
		}
		
		$expenses = $query->get();
		
		return response()->json($expenses);
	}
	
	public function store(Request $request) {
		$validated = $request->validate([
			'bedrag'                 => 'required|numeric|min:0',
			'categorie'              => 'required|string|max:255',
			'omschrijving'           => 'required|string|max:255',
			'status'                 => 'nullable|string|in:pending,goedgekeurd,afgekeurd',
			'afgekeurd_omschrijving' => 'nullable|string|max:255',
		]);
		
		$expense = Expense::create($validated);
		
		return response()->json([
			'message' => 'Expense created successfully.',
			'data'    => $expense,
		], 201);
	}
	
	public function approve(Request $request, $id) {
		$expense = Expense::findOrFail($id);
		
		$expense->update([
			'status' => 'goedgekeurd',
			'afgekeurd_omschrijving' => null,
		]);
		
		return response()->json([
			'message' => 'Expense approved successfully.',
			'data' => $expense
		]);
	}
	
	public function reject(Request $request, $id) {
		$validated = $request->validate([
			'afgekeurd_omschrijving' => 'required|string|max:255',
		]);
		
		$expense = Expense::findOrFail($id);
		
		$expense->update([
			'status' => 'afgekeurd',
			'afgekeurd_omschrijving' => $validated['afgekeurd_omschrijving'],
		]);
		
		return response()->json([
			'message' => 'Expense rejected successfully.',
			'data' => $expense
		]);
	}
}
