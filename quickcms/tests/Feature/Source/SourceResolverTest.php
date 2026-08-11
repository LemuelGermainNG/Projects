<?php

declare(strict_types=1);

use App\Core\Source\SourceResolver;
use Tests\Fixtures\Sources\UserSource;

it('resolves source records', function (): void {
    $result = app(SourceResolver::class)
        ->records(
            UserSource::class,
        );

    expect($result)
        ->toHaveKeys([
            'records',
            'pagination',
        ]);
});
