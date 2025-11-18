<?php

namespace App\Enums;

enum ExpenseStatus: string {
	
	case PENDING = 'pending';
	case GOEDGEKEURD = 'goedgekeurd';
	case AFGEKEURD = 'afgekeurd';
	
	/**
	 * Get all enum values as an array
	 */
	public static function values(): array {
		return array_column(self::cases(), 'value');
	}
	
	/**
	 * Get label for display purposes
	 */
	public function label(): string {
		return match ( $this ) {
			self::PENDING => 'Aanvraag',
			self::GOEDGEKEURD => 'Goedgekeurd',
			self::AFGEKEURD => 'Afgekeurd',
		};
	}
	
}
