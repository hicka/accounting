<?php

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Seyls\Accounting\Models\Currency;

use Faker\Generator as Faker;

$factory->define(
    Currency::class,
    function (Faker $faker) {
        return [
            'name' => $faker->name,
            'currency_code' => $faker->currencyCode,
        ];
    }
);
