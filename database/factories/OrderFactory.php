<?php

namespace Database\Factories;

use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => OrderType::inRandomOrder()->first()->id,
            'partnership_id' => Partnership::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'description' => fake()->text(1000),
            'date' => fake()->date(),
            'address' => fake()->address(),
            'amount' => fake()->numerify("#####"),
            'status' => fake()->randomElement(['Создан', 'Назначен исполнитель', 'Завершен']),
        ];
    }
}
