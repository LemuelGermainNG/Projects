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
    /**
     * Resolve a single model record.
     *
     * @param class-string<Model> $model
     * @param class-string<Data> $data
     */
    public static function read(
        string $model,
        string $data,
        string|int $id,
        SourceRequest $request,
    ): SourceResult {
        $record = $model::query()->find($id);

        if ($record === null) {
            return new SourceResult(
                records: [],
                pagination: [
                    'enabled' => false,
                    'perPage' => 1,
                    'page' => 1,
                    'total' => 0,
                    'lastPage' => 1,
                    'nextCursor' => null,
                    'previousCursor' => null,
                ],
            );
        }

        return new SourceResult(
            records: [
                $data::from($record)->toArray(),
            ],
            pagination: [
                'enabled' => false,
                'perPage' => 1,
                'page' => 1,
                'total' => 1,
                'lastPage' => 1,
                'nextCursor' => null,
                'previousCursor' => null,
            ],
        );
    }

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
