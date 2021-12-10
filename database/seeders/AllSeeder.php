<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(User::get()) == 0) {
            User::insert([
                'name' => 'Sigit Setiyo Wibowo',
                'uke' => 'Admin',
                'nip' => '6868768768765',
                'telepon' => '0812287669878',
                'email' => 'a@gmail.com',
                'password' => Hash::make(1),
            ]);
        }
    }
}
