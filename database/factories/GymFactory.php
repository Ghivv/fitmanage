<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gym>
 */
class GymFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company, // Nama gym (gunakan faker untuk data acak)
            'alamat' => $this->faker->address, // Alamat lengkap
            'kota' => $this->faker->city, // Kota
            'nomor_telepon' => $this->faker->phoneNumber, // Nomor telepon
            'email' => $this->faker->unique()->safeEmail, // Email unik
            'created_at' => now(), // Waktu pembuatan
            'updated_at' => now(), // Waktu pembaruan
        ];
    }

}
