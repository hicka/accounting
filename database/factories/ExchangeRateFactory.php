<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Faker\Generator as Faker;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\ExchangeRate;
use Seyls\Accounting\Models\Currency;

class ExchangeRateFactory extends Factory
{
    protected $model = ExchangeRate::class;

    public function definition()
    {
        return [
            'valid_from' => $this->faker->dateTimeThisMonth(),
            'valid_to' => Carbon::now(),
            'currency_id' => Currency::factory()->create()->id,
            'rate' => $this->faker->randomFloat(2, 1, 5),
        ];
    }
}

