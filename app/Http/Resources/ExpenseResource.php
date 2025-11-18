<?php

namespace App\Http\Resources;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource {
	
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array {
		return [
			'id'                     => $this->id,
			'bedrag'                 => $this->bedrag,
			'categorie'              => $this->categorie,
			'omschrijving'           => $this->omschrijving,
			'status'                 => $this->status,
			'afgekeurd_omschrijving' => $this->afgekeurd_omschrijving,
		];
	}
	
	public function store(StoreExpenseRequest $request): ExpenseResource {
		$expense = Expense::create($request->validated());
		
		return new ExpenseResource($expense);
	}
	
}
