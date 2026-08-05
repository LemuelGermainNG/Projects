<?php

declare(strict_types=1);

use App\Core\Schema\Form\Input\Toggle\ToggleSchema;

it('sets toggle properties', function (): void {
    $toggle = ToggleSchema::make()
        ->checked()
        ->onIcon('heroicon-o-check')
        ->offIcon('heroicon-o-x-mark')
        ->onColor('success')
        ->offColor('danger');

    expect($toggle->isChecked())->toBeTrue();

    expect($toggle->onIcon())
        ->toBe('heroicon-o-check');

    expect($toggle->offIcon())
        ->toBe('heroicon-o-x-mark');

    expect($toggle->onColor())
        ->toBe('success');

    expect($toggle->offColor())
        ->toBe('danger');
});
