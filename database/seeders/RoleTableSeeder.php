<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(count(Role::all()) == 0){
            DB::table('roles')->insert([
                ['id'=> 1, 'type'=> 'admin'],
                ['id'=> 2, 'type'=> 'user']
            ]);
        }else{
            echo "Role table already seeded";
        }
    }
}
