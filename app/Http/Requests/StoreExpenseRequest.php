<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest {
	
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool {
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array {
		return [
			'bedrag'       => 'required|numeric|min:0',
			'categorie'    => 'required|string|max:255',
			'omschrijving' => 'required|string|max:255',
		];
	}
	
	public function messages(): array {
		return [
			'bedrag.required'       => 'Het bedrag is verplicht.',
			'bedrag.numeric'        => 'Het bedrag moet een getal zijn.',
			'bedrag.min'            => 'Het bedrag moet minimaal 0 zijn.',
			'categorie.required'    => 'De categorie is verplicht.',
			'omschrijving.required' => 'De omschrijving is verplicht.',
		];
	}
	
}
