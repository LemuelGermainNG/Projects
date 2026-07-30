<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\ActionSchema;

abstract class Action extends ActionSchema
{
    /**
     * Create a new action instance.
     */
    public function __construct()
    {
        $this->configure();
    }

    /**
     * Configure the action defaults.
     */
    abstract protected function configure(): void;
}
