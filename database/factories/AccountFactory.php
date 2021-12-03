<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\Account;
use Seyls\Accounting\Models\Category;

class AccountFactory extends BaseFactory
{
    protected $model = Account::class;

    public function definition(): array
    {
        $types = array_keys(config('accounting')['accounts']);
        unset($types[3]);

        $type = $this->faker->randomElement($types);
        return [
            'name' => $this->faker->name,
            'account_type' => $type,
            'category_id' => Category::factory()->create()->id,
            'code' => $this->faker->randomDigit,
        ];
    }
}
