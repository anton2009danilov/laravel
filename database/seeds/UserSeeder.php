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
            'password' => Hash::make('123'),
            'remember_token' => null,
            'isAdmin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        factory(User::class, 10)->create();
    }
}

