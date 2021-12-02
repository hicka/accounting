<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

use Seyls\Accounting\Models\Balance;
use Seyls\Accounting\Models\Ledger;
use Seyls\Accounting\Models\Account;
use Seyls\Accounting\Models\LineItem;
use Seyls\Accounting\Models\Transaction;
use Seyls\Accounting\Models\Currency;
use Seyls\Accounting\Models\Vat;

class LedgerFactory extends Factory
{
    protected $model = Ledger::class;

    public function definition()
    {
        return [
            'transaction_id' => Transaction::factory()->create()->id,
            'currency_id' => Currency::factory()->create()->id,
            'vat_id' => Vat::factory()->create()->id,
            'post_account' => Account::factory()->create([
                'category_id' => null
            ])->id,
            'folio_account' => Account::factory()->create([
                'category_id' => null
            ])->id,
            'line_item_id' => LineItem::factory()->create()->id,
            'posting_date' => $this->faker->dateTimeThisMonth(),
            'entry_type' => $this->faker->randomElement([
                Balance::DEBIT,
                Balance::CREDIT
            ]),
            'amount' => $this->faker->randomFloat(2),
            'rate' => $this->faker->randomFloat(2),
        ];
    }
}
