<?php

namespace Database\Factories;

use App\Models\Gym;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gym_id' => 10,//Gym::all()->random()->id, // Ambil gym_id secara acak dari tabel gyms
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(), // Gunakan phoneNumber untuk nomor telepon
            'specialization' => fake()->jobTitle(), // Atau bisa juga menggunakan sentence/word
        ];
    }
}
