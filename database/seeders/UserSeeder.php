<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'pablo',
            'email' => 'pablo@example.com',
            'password' => bcrypt('Abc123456789.')
        ]);
    }
}
