<?php

namespace Database\Seeders;

use App\Models\Datakaryawan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Datakaryawan::factory()->count(20)->create();
        $this->call(RolePermissionSeeder::class);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'usertype' => 'admin',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'usertype' => 'user',
            'password' => bcrypt('user')
        ]);
    }
}
