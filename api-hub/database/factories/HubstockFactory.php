<?php

namespace Database\Factories;

use App\Models\Hubstock;
use Illuminate\Database\Eloquent\Factories\Factory;

class HubstockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hubstock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'partnerId' => $this->faker->randomDigit,
            'quantity' => $this->faker->numberBetween(1, 500),
            'cost' => $this->faker->numberBetween(1, 800),
            'stockLocalId' => $this->faker->randomDigit,
        ];
    }
}
