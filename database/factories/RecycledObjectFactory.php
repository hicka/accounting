<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\RecycledObject;
use Seyls\Accounting\User;

class RecycledObjectFactory extends Factory
{
    protected $model = RecycledObject::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'recyclable_id' => User::factory()->create()->id,
            'recyclable_type' => User::class,
        ];
    }
}