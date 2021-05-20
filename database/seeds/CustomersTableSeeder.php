<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Customer::create([
            'nama' => 'Satria',
            'email' => 'satria123@gmail.com',
            'password' => bcrypt('satria123'),
            'no_tlp' => '081234567891',
            'alamat' => 'taman Karang Baru',

        ]);
    }
}
