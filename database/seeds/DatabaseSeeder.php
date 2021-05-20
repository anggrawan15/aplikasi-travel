<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class); //ini yang akan di jalankan
        $this->call(CustomersTableSeeder::class); //ini untuk data customers
    }
}
