<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin', 'slug' => 'admin']);
        Role::create(['name' => 'Supervisor IT', 'slug' => 'supervisor-it']);
        Role::create(['name' => 'IT Staff', 'slug' => 'it-staff']);
        Role::create(['name' => 'Kepala Divisi', 'slug' => 'kepala-divisi']);
        Role::create(['name' => 'User', 'slug' => 'user']);
    }
}
