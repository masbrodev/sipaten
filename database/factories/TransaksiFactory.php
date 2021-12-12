<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        $nilai = $this->faker->valid()->randomElement($array = array(
            20000,
            15000,
            30000,
            70000,
        ));
        return [
            "kode_transaksi" => $this->faker->randomElement($array = array('CL','US')).$number++,
            "user_id" => $this->faker->randomDigitNotNull(),
            "kode_pagu" => "PAGU".$this->faker->numberBetween($min = 1, $max = 5),
            "jenis" => $this->faker->randomElement($array = array('claim', 'usulan')),
            "status" => "berhasil",
            "nilai" => $nilai,
            "sisa" => 500000,
        ];
    }
}
