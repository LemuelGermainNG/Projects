<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enums\Color;
use Closure;

final class DeleteAction extends Action
{
    protected string $id = 'delete';

    protected string $name = 'delete';

    protected string|Closure $label = 'Delete';

    protected string|IconInterface|Closure|null $icon = 'heroicon-o-trash';

    protected Color|Closure $color = Color::Danger;

    protected ActionTrigger $trigger = ActionTrigger::Request;
}
