<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;

final class ViewAction extends Action
{
    protected function configure(): void
    {
        $this
            ->id('view')
            ->name('view')
            ->label('View')
            ->icon('heroicon-o-eye')
            ->trigger(ActionTrigger::Modal);
    }
}
