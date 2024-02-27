<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_produk' => $this->faker->name(),
            'harga' => $this->faker->randomFloat(2, 0, 9999999.99), // Maksimum 10 digit dengan 2 digit di belakang koma
            'stok' => $this->faker->numberBetween(0, 30), // Nilai integer antara 0 dan 30

        ];
    }
}
