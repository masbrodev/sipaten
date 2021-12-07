<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClaimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nilai = $this->faker->valid()->randomElement($array = array(
            20000,
            15000,
            30000,
            70000,
        ));
        return [
            'bmn_id' => $this->faker->randomDigitNotNull(),
            'user_id' => $this->faker->randomDigitNotNull(),
            'kode_claim' => 'CL'.rand(),
            'nota_dinas' => $this->faker->domainName(),
            'nilai' => $nilai,
            'keterangan' => $this->faker->text(),
            'tindak_lanjut' => $this->faker->text(),
            'status' => 'proses'
        ];
    }
}
