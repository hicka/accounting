<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

abstract class BaseFactory extends Factory
{
    public function forEntity($entity)
    {
        return $this->state(function (array $attributes) use ($entity) {
            return [
                'entity_id' => $entity->id,
            ];
        });
    }
}