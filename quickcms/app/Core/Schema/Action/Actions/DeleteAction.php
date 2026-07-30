<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;

final class DeleteAction extends Action
{
    protected function configure(): void
    {
        $this
            ->id('delete')
            ->name('delete')
            ->label('Delete')
            ->icon('heroicon-o-trash')
            ->color(Color::Danger)
            ->trigger(ActionTrigger::Request);
    }
}
