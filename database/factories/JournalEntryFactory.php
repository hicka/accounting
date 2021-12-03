<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Transactions\JournalEntry;
use Seyls\Accounting\Models\Transaction;
use Seyls\Accounting\Models\Account;

class JournalEntryFactory extends BaseFactory
{
    protected $model = JournalEntry::class;

    public function definition()
    {
        return [
            'account_id' => Account::factory()->create()->id,
            'date' => Carbon::now(),
            'narration' => $this->faker->word,
            'transaction_type' => Transaction::JN,
            'amount' => $this->faker->randomFloat(2),
        ];
    }
}