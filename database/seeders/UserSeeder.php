<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $adminRole = Role::where('slug', 'admin')->first();
        $supervisorItRole = Role::where('slug', 'supervisor-it')->first();
        $itStaffRole = Role::where('slug', 'it-staff')->first();
        $kepalaDivisiRole = Role::where('slug', 'kepala-divisi')->first();
        $userRole = Role::where('slug', 'user')->first();

        $defaultPassword = Hash::make('password');

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => $defaultPassword,
            'role_id' => $adminRole->id,
            'superior_id' => null,
        ]);
        $supervisorIT = User::create([
            'name' => 'Supervisor IT',
            'email' => 'spv.it@example.com',
            'password' => $defaultPassword,
            'role_id' => $supervisorItRole->id,
            'superior_id' => null,
        ]);
        User::create([
            'name' => 'IT Staff',
            'email' => 'it.staff@example.com',
            'password' => $defaultPassword,
            'role_id' => $itStaffRole->id,
            'superior_id' => $supervisorIT->id,
        ]);
        $kepalaDivisi = User::create([
            'name' => 'Kepala Divisi A',
            'email' => 'kadiv.a@example.com',
            'password' => $defaultPassword,
            'role_id' => $kepalaDivisiRole->id,
            'superior_id' => null,
        ]);
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => $defaultPassword,
            'role_id' => $userRole->id,
            'superior_id' => $kepalaDivisi->id,
        ]);
        User::create([
            'name' => 'User Mandiri',
            'email' => 'user.mandiri@example.com',
            'password' => $defaultPassword,
            'role_id' => $userRole->id,
            'superior_id' => null,
        ]);
    }
}
