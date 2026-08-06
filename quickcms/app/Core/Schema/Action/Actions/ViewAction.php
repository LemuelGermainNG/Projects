<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use Closure;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;

final class ViewAction extends Action
{
    protected string $id = 'view';

    protected string|Closure $name = 'view';

    protected string|Closure $label = 'View';

    protected string|IconInterface|Closure|null $icon = Heroicons::Eye;

    protected ActionTrigger $trigger = ActionTrigger::Modal;
}
