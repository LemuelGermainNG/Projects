<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use Closure;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enums\Color;
use App\Core\Support\Enums\Icons\Heroicons;

final class EditAction extends Action
{
    protected string $id = 'edit';

    protected string $name = 'edit';

    protected string|Closure $label = 'Edit';

    protected string|IconInterface|Closure|null $icon = Heroicons::PencilSquare;

    protected Color|Closure $color = Color::Primary;

    protected ActionTrigger $trigger = ActionTrigger::Modal;
}
