<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Contracts;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Schema\Action\Enums\ActionType;

interface ActionInterface
{
    public function type(?ActionType $type = null): ActionType|static;

    public function trigger(?ActionTrigger $trigger = null): ActionTrigger|static;
}
