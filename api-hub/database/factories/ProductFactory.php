<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->numberBetween(1000, 8000),
                'name' => $this->faker->name,
                'reference' => $this->faker->randomFloat(3, 0, NULL),
                'price' => $this->faker->randomFloat(3, 0, 2000),
                'friendly_url' => $this->faker->url,
                'ean' => $this->faker->numberBetween(3000, 8000),
                'upc' => $this->faker->randomNumber(null, false),
                'active' => $this->faker->boolean,
                'visibility' => $this->faker->boolean,
                'condition' => $this->faker->word,
                'available_for_order' => $this->faker->boolean,
                'show_price' => $this->faker->boolean,
                'available_online_only' => $this->faker->boolean,
                'short_description' => $this->faker->sentence(2, true),
                'description' => $this->faker->sentence(6, true),
                'wholesale_price' => $this->faker->randomFloat(3, 0, 2000),
                'unit_price' => $this->faker->randomFloat(3, 0, 2000),
                'special_price' => $this->faker->randomFloat(3, 0, 2000),
                'special_price_start_date' => $this->faker->dateTimeBetween('-3 years', '-2 years', null),
                'special_price_end_date' => $this->faker->dateTimeBetween('-1 years', 'now', null),
                'on_sale' => $this->faker->boolean,
                'meta_title' => $this->faker->title,
                'meta_description' => $this->faker->sentence(6, true),
                'image_url' => $this->faker->imageUrl(800, 600, 'cats'),
                'quantity' => $this->faker->numberBetween(1, 200),
                'out_of_stock' => $this->faker->boolean,
                'minimal_quantity' => $this->faker->numberBetween(1, 20),
                'product_available_date' => $this->faker->dateTimeBetween('-1 years', 'now', null),
                'text_when_stock' => $this->faker->sentence(5, true),
                'text_when_backorder_allowed' => $this->faker->sentence(5, true),
                'category' => $this->faker->word,
                'default_category_id' => $this->faker->numberBetween(1, 20),
                'width' => $this->faker->randomFloat(null, 0, 100),
                'height' => $this->faker->randomFloat(null, 0, 100),
                'depth' => $this->faker->randomFloat(null, 0, 100),
                'weight' => $this->faker->randomFloat(null, 0, 100),
                'additional_shipping' => $this->faker->randomFloat(null, 0, 100),
        ];
    }
}
