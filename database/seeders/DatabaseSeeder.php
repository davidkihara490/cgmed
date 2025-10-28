<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'CGMED',
            'last_name' => 'Admin',
            'email' => 'admin@cgmed.com',
            'password' => Hash::make('password'),
            'phone' => '0712345678',
            'terms_agreement' => true,
            'is_admin' => true
        ]);

        $this->call([
            // ProductSeeder::class,
            // SettingSeeder::class,
            // AboutSectionSeeder::class,
        ]);
    }
}
