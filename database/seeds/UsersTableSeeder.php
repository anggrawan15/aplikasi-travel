<?php

use Illuminate\Database\Seeder;
use App\User; // untuk menggunakan 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Angga',
            'email' => 'angga123@gmail.com',
            'password' => bcrypt('angga123')
        ]);
    }
}
