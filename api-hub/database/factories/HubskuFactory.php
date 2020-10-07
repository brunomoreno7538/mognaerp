<?php

namespace Database\Factories;

use App\Models\Hubsku;
use Illuminate\Database\Eloquent\Factories\Factory;

class HubskuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hubsku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->numberBetween(1000, 8000),
            'title' => $this->faker->name,
            'partnerId' => $this->faker->numberBetween(1, 500),
            'ean' => $this->faker->numberBetween(1000, 8000),
            'amount' => $this->faker->randomDigit,
            'price' => $this->faker->randomDigit,
            'sellPrice' => $this->faker->randomDigit
        ];
    }
}
