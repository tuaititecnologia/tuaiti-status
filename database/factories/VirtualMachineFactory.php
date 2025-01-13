<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VirtualMachine>
 */
class VirtualMachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'machine_id' => $this->faker->numberBetween(100,999),
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['QEMU', 'LXC']),
        ];
    }
}
