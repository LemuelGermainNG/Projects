<?php

declare(strict_types=1);

namespace App\Core\Source;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

final class SourceResolver
{
    /**
     * Resolve source records.
     *
     * @return array{
     *     records: list<array<string, mixed>>,
     *     pagination: array{
     *         enabled: bool,
     *         perPage: int,
     *         page: int,
     *         total: int,
     *         lastPage: int
     *     }
     * }
     */
    public function records(
        Source|string $source,
        int $page = 1,
        int $perPage = 20,
    ): array {
        $sourceClass = $source instanceof Source
            ? $source::class
            : $source;

        /** @var class-string<Data> $dataClass */
        $dataClass = $sourceClass::data();

        $paginator = SourceQuery::for(
            $sourceClass,
        )->paginate(
            perPage: $perPage,
            page: $page,
        );

        return [
            'records' => $paginator
                ->getCollection()
                ->map(
                    fn (Model $model): array =>
                        $dataClass::from($model)->toArray(),
                )
                ->values()
                ->all(),

            'pagination' => [
                'enabled' => true,
                'perPage' => $paginator->perPage(),
                'page' => $paginator->currentPage(),
                'total' => $paginator->total(),
                'lastPage' => $paginator->lastPage(),
            ],
        ];
    }
}
