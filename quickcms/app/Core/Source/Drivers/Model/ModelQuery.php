<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers\Model;

use App\Core\Source\SourceRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

final class ModelQuery
{
    /**
     * @param class-string<Model> $model
     * @param list<string> $allowedFilters
     * @param list<string> $allowedSorts
     */
    public static function for(
        string $model,
        SourceRequest $request,
        array $allowedFilters = [],
        array $allowedSorts = [],
    ): QueryBuilder {
        $query = QueryBuilder::for(
            $model::query(),
            $request->toHttpRequest(),
        );

        if ($allowedFilters !== []) {
            $query->allowedFilters(
                ...$allowedFilters,
            );
        }

        if ($allowedSorts !== []) {
            $query->allowedSorts(
                ...$allowedSorts,
            );
        }

        return $query;
    }
}
