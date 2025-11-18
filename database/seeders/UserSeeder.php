<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    DB::table('users')->insert([
	        [
				'first_name' => 'Geert',
				'last_name' => 'Huylebroeck',
				'email' => 'geert.huylebroeck@kobavzw.be',
				'password' => Hash::make('admin'),
				'admin' => true,
	        ],
	        [
		        'first_name' => 'Matthias',
		        'last_name' => 'Claessen',
		        'email' => 'matthiasclaessen@gmail.com',
		        'password' => Hash::make('user'),
		        'admin' => false,
	        ]
	    ]);
    }
}
