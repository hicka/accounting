<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Entity;

class EntityFactory extends BaseFactory
{
    protected $model = Entity::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'multi_currency' => $this->faker->boolean(),
        ];
    }
}