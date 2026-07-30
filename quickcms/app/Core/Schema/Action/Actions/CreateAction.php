<?php

declare(strict_types=1);

namespace App\Core\Schema\Action\Actions;

use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Support\Enums\Color;

final class CreateAction extends Action
{
    protected function configure(): void
    {
        $this
            ->id('create')
            ->name('create')
            ->label('Create')
            ->icon('heroicon-o-plus')
            ->color(Color::Primary)
            ->trigger(ActionTrigger::Modal);
    }
}
