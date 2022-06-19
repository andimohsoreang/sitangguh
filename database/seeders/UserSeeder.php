<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('admin123'),
        ]);
        
        $admin->assignRole('admin');

        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'petugas@role.test',
            'password' => bcrypt('petugas123'),
        ]);
        
        $petugas->assignRole('petugas');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@role.test',
            'password' => bcrypt('user123'),
        ]);
        
        $user->assignRole('user');
    }
}
