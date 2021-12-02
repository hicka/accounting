<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Category;
use Faker\Generator as Faker;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'category_type' => $this->faker->randomElement(
                array_keys(config('accounting')['accounts'])
            ),
        ];
    }
}