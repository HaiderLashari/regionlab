<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
           DB::table('users')->insert([
            'name' => 'Haider',
            'email' => 'haiderlashari1122@gmail.com',
            'password' => Hash::make('95121472'),
            'role' => 'admin',
        ]);
    }
}
