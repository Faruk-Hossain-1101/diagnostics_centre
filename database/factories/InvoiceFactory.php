<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'doctor_id' => \App\Models\Doctor::factory(),
            'total_amount' => $this->faker->randomFloat(2, 100, 2000), // total between 100 and 2000
            'discount_amount' => $this->faker->randomFloat(2, 0, 500), // discount between 0 and 500
            'net_amount' => function (array $attributes) {
                return $attributes['total_amount'] - $attributes['discount_amount'];
            },
        ];
    }
}
