<?php

use App\User;
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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'email_verified_at' => null,
            'password' => '$2y$10$s/AtztyvC5LQc9QJdYz/x.kEk9KpGtJ0r9IUu.JchP1Kay8/1ebza',
            'remember_token' => null,
            'created_at' => '2020-04-17 17:21:08',
            'updated_at' => '2020-04-17 17:21:08'
        ]);
    }
}

