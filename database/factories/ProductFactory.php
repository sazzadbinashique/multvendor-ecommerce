<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'category_id'=>Category::all()->random()->id,
            'name' => $this->faker->sentence(3),
            'alias' => $this->faker->slug(3),
            'image' => 'uploads/products/book.png',
            'description' => $this->faker->paragraph(4),
            'price' => $this->faker->numberBetween(100, 10000)
        ];
    }
}
