<?php

namespace Seyls\Accounting\Tests;

use Faker\Factory as Faker;

use Orchestra\Testbench\TestCase as Orchestra;

use Illuminate\Support\Facades\Config;

use Seyls\Accounting\User;

use Seyls\Accounting\AccountingServiceProvider;

use Seyls\Accounting\Models\Currency;
use Seyls\Accounting\Models\ReportingPeriod;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {

        parent::setUp();

        Config::set('accounting.user_model', User::class);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->faker = Faker::create();

        $user = User::factory()->create();
        $this->be($user);

        $currency = Currency::factory()->create();

        $entity = $user->entity;
        $entity->currency_id = $currency->id;
        $entity->save();

        $this->entity = $entity;

        $this->reportingCurrencyId = $currency->id;

        $this->period = ReportingPeriod::factory()->create([
            "calendar_year" => date("Y"),
            "entity_id" => $user->entity->id,
        ]);
    }

    /**
     * Add the package provider
     *
     * @param  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [AccountingServiceProvider::class];
    }
}
