<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Администратор',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
