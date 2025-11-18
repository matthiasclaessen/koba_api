<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RejectExpenseRequest extends FormRequest {
	
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool {
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 */
	public function rules(): array {
		return [
			'afgekeurd_omschrijving' => 'required|string|max:255',
		];
	}
	
	/**
	 * Custom error messages
	 */
	public function messages(): array {
		return [
			'afgekeurd_omschrijving.required' => 'Een reden voor afkeuring is verplicht.',
			'afgekeurd_omschrijving.max'      => 'De reden mag maximaal 255 tekens bevatten.',
		];
	}
	
}
