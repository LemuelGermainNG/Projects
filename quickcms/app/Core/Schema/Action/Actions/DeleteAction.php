<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use Closure;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enum\Color;

final class DeleteAction extends Action
{
    protected string $id = 'delete';

    protected string|Closure $name = 'delete';

    protected string|Closure $label = 'Delete';

    protected string|IconInterface|Closure|null $icon = Heroicons::Trash;

    protected Color|Closure $color = Color::Danger;

    protected ActionTrigger $trigger = ActionTrigger::Request;
}
