<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use Closure;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enum\Color;

final class CreateAction extends Action
{
    protected string $id = 'create';

    protected string|Closure $name = 'create';

    protected string|Closure $label = 'Create';

    protected string|IconInterface|Closure|null $icon = Heroicons::Plus;

    protected Color|Closure $color = Color::Primary;

    protected ActionTrigger $trigger = ActionTrigger::Modal;
}
