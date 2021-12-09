<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Pagu::factory(5)->create();
        \App\Models\Bmn::factory(80)->create();
        \App\Models\Claim::factory(80)->create();
        \App\Models\Usulan::factory(80)->create();

        $this->call(AllSeeder::class);
    }
}
