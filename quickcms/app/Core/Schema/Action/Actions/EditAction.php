<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;
use Closure;

final class EditAction extends Action
{
    protected string $id = 'edit';

    protected string $name = 'edit';

    protected string|Closure $label = 'Edit';

    protected string|Closure|null $icon = 'heroicon-o-pencil-square';

    protected Color|Closure $color = Color::Primary;

    protected ActionTrigger $trigger = ActionTrigger::Modal;
}
