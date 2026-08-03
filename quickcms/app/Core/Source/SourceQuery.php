<?php

declare(strict_types=1);

namespace App\Core\Source;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

final class SourceQuery
{
    /**
     * @template T of Source
     *
     * @param class-string<T> $source
     */
    public static function for(string $source): QueryBuilder
    {
        /** @var class-string<Model> $model */
        $model = $source::model();

        return QueryBuilder::for(
            $model::query(),
        );
    }
}
