<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@queertech.com'],
            [
                'name' => 'Admin',
                'password' => 'admin1234',
                'is_admin' => true,
            ]
        );
    }
}
