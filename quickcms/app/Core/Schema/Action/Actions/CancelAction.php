<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Support\Enums\Color;

final class CancelAction extends Action
{
    protected function configure(): void
    {
        $this
            ->id('cancel')
            ->name('cancel')
            ->label('Cancel')
            ->icon('heroicon-o-x-mark')
            ->color(Color::Secondary);
    }
}
