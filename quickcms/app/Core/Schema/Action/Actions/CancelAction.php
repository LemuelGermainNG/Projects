<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use Closure;
use App\Core\Support\Enum\Icons\Heroicons;
use App\Core\Support\Contracts\IconInterface;
use App\Core\Support\Enum\Color;

final class CancelAction extends Action
{
    protected string $id = 'cancel';

    protected string|Closure $name = 'cancel';

    protected string|Closure $label = 'Cancel';

    protected IconInterface|string|Closure|null $icon = Heroicons::XMark;

    protected Color|Closure $color = Color::Secondary;
}
