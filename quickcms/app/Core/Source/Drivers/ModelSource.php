<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers;

use App\Core\Source\Drivers\Model\ModelQuery;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

final class ModelSource
{
    /**
     * @param class-string<Model> $model
     * @param class-string<Data> $data
     * @param list<string> $allowedFilters
     * @param list<string> $allowedSorts
     */
    public static function resolve(
        string $model,
        string $data,
        SourceRequest $request,
        array $allowedFilters = [],
        array $allowedSorts = [],
    ): SourceResult {
        $query = ModelQuery::for(
            model: $model,
            request: $request,
            allowedFilters: $allowedFilters,
            allowedSorts: $allowedSorts,
        );

        $paginator = $query->paginate(
            perPage: $request->perPage,
            page: $request->page,
        );

        return new SourceResult(
            records: $paginator
                ->getCollection()
                ->map(
                    fn (Model $model): array =>
                        $data::from($model)->toArray(),
                )
                ->values()
                ->all(),

            pagination: [
                'enabled' => true,
                'perPage' => $paginator->perPage(),
                'page' => $paginator->currentPage(),
                'total' => $paginator->total(),
                'lastPage' => $paginator->lastPage(),
            ],
        );
    }
}
