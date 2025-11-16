<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable
		= [
			'bedrag',
			'categorie',
			'omschrijving',
			'status',
			'afgekeurd_omschrijving',
		];
	
}
