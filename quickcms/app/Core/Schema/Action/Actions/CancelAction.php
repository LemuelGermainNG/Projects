<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enums\Color;
use Closure;

final class CancelAction extends Action
{
    protected string $id = 'cancel';

    protected string $name = 'cancel';

    protected string|Closure $label = 'Cancel';

    protected string|IconInterface|Closure|null $icon = 'heroicon-o-x-mark';

    protected Color|Closure $color = Color::Secondary;
}
