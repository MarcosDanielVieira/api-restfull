<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create();

        \App\Models\User::factory()->create([
            'name'              => 'Libery',
            'email'             => 'rh@liberfly.com.br',
            'email_verified_at' => now(),
            'password'          => '$2y$10$w6C12pnK2hZePSLloae.3uwKgJk94czV.ESmXRBLayd/J5i.100PK', // 123456789
            'remember_token'    => Str::random(10),
        ]);
    }
}
