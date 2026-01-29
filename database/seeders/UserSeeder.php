<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
User::create([
    
        'name' => 'Admin User',
        'email' => 'admin@gmail.com',
        'role' => 'admin',
        'password' => Hash::make('12345678'),]);


User::create([
    
        'name' => 'Edito man User',
        'email' => 'edito@gmail.com',
        'role' => 'editor',
        'password' => Hash::make('12345678'),]);

}
}
