<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Support\Enums\Color;

final class SaveAction extends Action
{
    protected function configure(): void
    {
        $this
            ->id('save')
            ->name('save')
            ->label('Save')
            ->icon('heroicon-o-check')
            ->color(Color::Success);
    }
}
