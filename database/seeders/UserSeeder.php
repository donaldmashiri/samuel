<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::where('email', 'admin@admin.com')->first();

        if(!$user){
            User::create([
                'role' => 'admin',
                'name' => 'Samuel',
                'email' => 'admin@admin.com',
                'national_id' => '12345678',
                'dob' => '12122000',
                'password' => Hash::make('password')
            ]);
        }
    }
}
