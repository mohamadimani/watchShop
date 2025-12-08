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
    public function run()
    {
        if (User::where('mobile', '09191930406')->first()) {
            return false;
        }

        User::create([
            'name' => 'admin',
            'email' => 'mohamadimahdi@yahoo.com',
            'password' => Hash::make('09191930406'),
            'mobile' => '09191930406',
        ]);
    }
}
