<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;

final class EditAction extends Action
{
    protected function configure(): void
    {
        $this
            ->id('edit')
            ->name('edit')
            ->label('Edit')
            ->icon('heroicon-o-pencil-square')
            ->color(Color::Primary)
            ->trigger(ActionTrigger::Modal);
    }
}
