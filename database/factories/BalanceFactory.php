<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Account;
use Seyls\Accounting\Models\Transaction;
use Seyls\Accounting\Models\Balance;
use Seyls\Accounting\Models\Currency;
use Seyls\Accounting\Models\ExchangeRate;

class BalanceFactory extends BaseFactory
{
    protected $model = Balance::class;

    public function definition(): array
    {

        return [
            'exchange_rate_id' => ExchangeRate::factory()->create()->id,
            'currency_id' => Currency::factory()->create()->id,
            'account_id' => Account::factory()->create([
                'account_type' => Account::INVENTORY,
                'category_id' => null
            ])->id,
            'reporting_period_id' => 1,
            'transaction_date' => Carbon::now()->subYears(1.5),
            'transaction_no' => $this->faker->word,
            'transaction_type' => $this->faker->randomElement([
                Transaction::IN,
                Transaction::BL,
                Transaction::JN
            ]),
            'reference' => $this->faker->word,
            'balance_type' =>  $this->faker->randomElement([
                Balance::DEBIT,
                Balance::CREDIT
            ]),
            'balance' => $this->faker->randomFloat(2),
        ];
    }
}
