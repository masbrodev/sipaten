<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BmnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_pagu' => 'PAGU'.$this->faker->numberBetween($min = 1, $max = 5),
            'kode_barang' => rand(),
            'nama_barang' => $this->faker->city(),
            'merk_type' => $this->faker->country(),
            'tahun_peroleh' => $this->faker->year($max = 'now'),
            'kondisi' => $this->faker->currencyCode(),
            'lokasi' => $this->faker->creditCardType(),
            'pengurus' => $this->faker->email(),
            'keterangan' => $this->faker->emoji(),
        ];
    }
}
