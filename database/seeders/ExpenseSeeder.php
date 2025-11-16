<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		DB::table('expenses')->insert([
			[
				'bedrag'                 => 50,
				'categorie'              => 'Aankoop',
				'omschrijving'           => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'status'                 => 'pending',
				'afgekeurd_omschrijving' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'created_at'             => now(),
				'updated_at'             => now(),
			],
			[
				'bedrag'                 => 200,
				'categorie'              => 'Dienstverplaatsing',
				'omschrijving'           => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'status'                 => 'pending',
				'afgekeurd_omschrijving' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'created_at'             => now(),
				'updated_at'             => now(),
			],
			[
				'bedrag'                 => 75,
				'categorie'              => 'Woon-werkverkeer',
				'omschrijving'           => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'status'                 => 'goedgekeurd',
				'afgekeurd_omschrijving' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'created_at'             => now(),
				'updated_at'             => now(),
			],
			[
				'bedrag'                 => 500,
				'categorie'              => 'Aankoop',
				'omschrijving'           => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'status'                 => 'afgekeurd',
				'afgekeurd_omschrijving' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
				'created_at'             => now(),
				'updated_at'             => now(),
			],
		]);
	}
	
}
