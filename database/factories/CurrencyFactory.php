<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Currency;

use Faker\Generator as Faker;

class CurrencyFactory extends BaseFactory
{
    protected $model = Currency::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'currency_code' => $this->faker->currencyCode,
        ];
    }
}