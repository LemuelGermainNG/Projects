<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use Closure;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enum\Color;

final class SaveAction extends Action
{
    protected string $id = 'save';

    protected string|Closure $name = 'save';

    protected string|Closure $label = 'Save';

    protected string|IconInterface|Closure|null $icon = Heroicons::Check;

    protected Color|Closure $color = Color::Success;
}
