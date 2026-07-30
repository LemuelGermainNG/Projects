<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enums\Color;
use Closure;

final class CreateAction extends Action
{
    protected string $id = 'create';

    protected string $name = 'create';

    protected string|Closure $label = 'Create';

    protected string|IconInterface|Closure|null $icon = 'heroicon-o-plus';

    protected Color|Closure $color = Color::Primary;

    protected ActionTrigger $trigger = ActionTrigger::Modal;
}
