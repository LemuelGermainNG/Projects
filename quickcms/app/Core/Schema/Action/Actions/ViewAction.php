<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;
use Closure;

final class ViewAction extends Action
{
    protected string $id = 'view';

    protected string $name = 'view';

    protected string|Closure $label = 'View';

    protected string|IconInterface|Closure|null $icon = 'heroicon-o-eye';

    protected ActionTrigger $trigger = ActionTrigger::Modal;
}
