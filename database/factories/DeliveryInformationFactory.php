<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryInformation>
 */
class DeliveryInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'order_code' => Order::factory(),
            'timestamp' => $this->faker->unique()->numberBetween(100000, 10000000),
            'status' => $this->faker->randomElement(['received', 'processing', 'delivered'])
        ];
    }
}
