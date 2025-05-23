<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatakaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nik' => $this->faker->unique()->numerify('##########'), // 10 digit unik
            'email' => $this->faker->unique()->safeEmail(),
            'no_hp' => $this->faker->optional()->phoneNumber(),
            'alamat' => $this->faker->optional()->address(),
            'jabatan' => $this->faker->randomElement(['Staff', 'Manager', 'Supervisor', 'HRD']),
            'tanggal_masuk' => $this->faker->date(),
        ];
    }
}
