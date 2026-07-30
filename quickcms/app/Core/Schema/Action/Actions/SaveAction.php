<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enums\Color;
use Closure;

final class SaveAction extends Action
{
    protected string $id = 'save';

    protected string $name = 'save';

    protected string|Closure $label = 'Save';

    protected string|IconInterface|Closure|null $icon = 'heroicon-o-check';

    protected Color|Closure $color = Color::Success;
}
