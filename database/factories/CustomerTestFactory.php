<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CustomerTest;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerTest>
 */
class CustomerTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'test_id' => \App\Models\Test::factory(),
            'invoice_id' => \App\Models\Invoice::factory(),
            'price' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
