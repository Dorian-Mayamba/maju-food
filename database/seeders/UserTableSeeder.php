<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (count(User::all()) == 0) {
            DB::table('users')->insert([
                [
                    'name' => 'mado masi',
                    'email' => 'madomasi@majufood.com',
                    'password' => Hash::make('majulie68'),
                    'role_id' => 1
                ],
                [
                    'name' => 'dorian',
                    'email' => 'dorian.mayamba@majufood.com',
                    'password' => Hash::make('dodoetienne01'),
                    'role_id' => 1
                ]
            ]);
        } else {
            echo "User table already seeded";
        }
    }
}
