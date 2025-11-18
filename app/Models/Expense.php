<?php

namespace App\Models;

use App\Enums\ExpenseStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model {
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable
		= [
			'user_id',
			'bedrag',
			'categorie',
			'omschrijving',
			'status',
			'afgekeurd_omschrijving',
		];
	
	protected $guarded = [ 'id', 'created_at', 'updated_at' ];
	
	protected $casts
		= [
			'bedrag' => 'decimal:2',
			'status' => ExpenseStatus::class,
		];
	
	/**
	 * The attributes that should have default values.
	 */
	protected $attributes
		= [
			'status' => ExpenseStatus::PENDING->value,
		];
	
	public function user(): BelongsTo {
		return $this->belongsTo(User::class)->withDefault();
	}
	
}
