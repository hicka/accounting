<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Transaction;
use Seyls\Accounting\Models\Account;
use Seyls\Accounting\Models\Currency;
use Seyls\Accounting\Models\ExchangeRate;

class TransactionFactory extends BaseFactory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'transaction_date' => Carbon::now(),
            'transaction_no' => $this->faker->word,
            'transaction_type' => $this->faker->randomElement(array_keys(config('accounting')['transactions'])),
            'reference' => $this->faker->word,
            'narration' => $this->faker->sentence,
            'credited' =>  true,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Transaction $transaction) {
            $transaction->exchange_rate_id = ExchangeRate::factory()->create([
                'entity_id' => $transaction->entity_id
            ])->id;
            $transaction->currency_id = Currency::factory()->create([
                'entity_id' => $transaction->entity_id
            ])->id;
            $transaction->account_id = Account::factory()->create([
                'entity_id' => $transaction->entity_id
            ])->id;
        })->afterCreating(function (Transaction $transaction) {
            //
        });
    }
}

//$factory->define(
//    Transaction::class,
//    function (Faker $faker) {
//        return [
//            'exchange_rate_id' => factory(ExchangeRate::class)->create()->id,
//            'currency_id' => factory(Currency::class)->create()->id,
//            'account_id' => Account::factory()->create()->id,
//            'transaction_date' => Carbon::now(),
//            'transaction_no' => $faker->word,
//            'transaction_type' => $faker->randomElement(array_keys(config('accounting')['transactions'])),
//            'reference' => $faker->word,
//            'narration' => $faker->sentence,
//            'credited' =>  true,
//        ];
//    }
//);
