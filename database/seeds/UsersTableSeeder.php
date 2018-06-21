<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=0; $i < 3; $i++) { 
		DB::table('users')->insert([
		'name' => str_random(8),
		'email' => 'admin'.$i.'@gmail.com',
		'password' => bcrypt('admin123'),
		'status' => 'admin'
		]);

		}
    }
}
