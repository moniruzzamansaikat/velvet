<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $admin           = new Admin();
        $admin->name     = 'Admin';
        $admin->username = 'admin';
        $admin->email    = 'admin@gmail.com';
        $admin->password = \Hash::make('admin');
        $admin->save();
    }
}
