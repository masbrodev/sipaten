<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaguFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        $pagu = $this->faker->valid()->randomElement($array = array(
            20000000,
            15000000,
            30000000,
            70000000,
        ));

        $jumlah = $this->faker->valid()->randomElement($array = array(
            5,
            10,
        ));
        return [
            'kode_pagu' => "PAGU". $number++,
            'uraian' => $this->faker->text($maxNbChars = 50),
            'jenis_volume' => $this->faker->valid()->randomElement($array = array(
                'PKT',
                'BLN',
                'KL',
            )),
            'jumlah_volume' => $jumlah,
            'nilai' => $pagu,
            'pagu_anggaran' => $pagu * $jumlah,
            'sisa' => $pagu * $jumlah,
        ];
    }
}
