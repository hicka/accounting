<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Assignment;
use Seyls\Accounting\Models\Transaction;

class AssignmentFactory extends BaseFactory
{
    protected $model = Assignment::class;

    public function definition()
    {
        return [
            'assignment_date' => $this->faker->dateTimeThisMonth(),
            'transaction_id' => Transaction::factory()->create()->id,
            'cleared_id' => Transaction::factory()->create()->id,
            'cleared_type' => Transaction::class,
            'amount' => $this->faker->randomFloat(2),
        ];
    }
}