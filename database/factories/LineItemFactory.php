<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\LineItem;
use Seyls\Accounting\Models\Account;
use Seyls\Accounting\Models\Transaction;

class LineItemFactory extends Factory
{
    protected $model = LineItem::class;

    public function definition()
    {
        return [
            'transaction_id' => Transaction::factory()->create()->id,
            'account_id' => Account::factory()->create([
                'category_id' => null
            ])->id,
            'narration' => $this->faker->sentence,
            'quantity' => $this->faker->randomNumber(),
            'amount' => $this->faker->randomFloat(2, 0, 200),
        ];
    }
}