<?php
namespace Database\Factories;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Illuminate\Database\Eloquent\Factories\Factory;
use Seyls\Accounting\Models\ReportingPeriod;
use Faker\Generator as Faker;

class ReportingPeriodFactory extends Factory
{
    protected $model = ReportingPeriod::class;

    public function definition()
    {
        return [
            'period_count' => $this->faker->randomDigit,
            'calendar_year' => $this->faker->unique()->year,
            'status' => ReportingPeriod::OPEN,
        ];
    }
}
