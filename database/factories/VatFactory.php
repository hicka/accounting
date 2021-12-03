<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Vat;
use Seyls\Accounting\Models\Account;

class VatFactory extends BaseFactory
{
    protected $model = Vat::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->randomLetter(),
            'rate' => $this->faker->randomDigit(),
            'account_id' => Account::factory()->create([
                'account_type' => Account::CONTROL,
                'category_id' => null
            ])->id,
        ];
    }
}
