<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'director']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'researcher']);
        Role::create(['name' => 'reviewer']);
        Role::create(['name' => 'adviser']);
        
    }

    
}
