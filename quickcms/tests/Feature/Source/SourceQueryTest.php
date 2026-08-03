<?php

declare(strict_types=1);

use App\Core\Source\SourceQuery;
use Spatie\QueryBuilder\QueryBuilder;
use Tests\Fixtures\Sources\UserSource;

it('creates a query builder for a source', function (): void {
    expect(
        SourceQuery::for(
            UserSource::class,
        ),
    )->toBeInstanceOf(QueryBuilder::class);
});
