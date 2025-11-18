<?php

use App\Enums\ExpenseStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('expenses', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
			$table->decimal('bedrag', 10);
			$table->string('categorie');
			$table->string('omschrijving');
			$table->enum('status', ExpenseStatus::values())->default(ExpenseStatus::PENDING->value);
			$table->string('afgekeurd_omschrijving')->nullable();
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('expenses');
	}
	
};
