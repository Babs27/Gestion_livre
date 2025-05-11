<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'babacar',
            'email' => 'babacar@yahoo.com'
        ]);

        User::create([
            'name' => 'khadim',
            'email' => 'khadim@yahoo.com'
        ]);

        User::create([
            'name' => 'css',
            'email' => 'css@yahoo.com'
        ]);
    }
}