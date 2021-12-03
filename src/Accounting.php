<?php

namespace Seyls\Accounting;

use _PHPStan_76800bfb5\Nette\Neon\Entity;

class Accounting
{
    private $entity;


    public function __construct(Entity $entity = null)
    {
        $this->entity = $entity;
    }

    public function createEntity($name)
    {
        $entity = Entity::create([
            'name' => $name
        ]);

        $this->entity = $entity;
        return $entity;
    }

    public function createAccount($accountName, $accountType, $openingBalance = 0)
    {

    }

}
