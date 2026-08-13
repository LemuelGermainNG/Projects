<?php

declare(strict_types=1);

namespace App\Core\Source;

final readonly class SourceResult
{
    /**
     * @param  list<array<string, mixed>>  $records
     * @param array{
     *     enabled: bool,
     *     perPage: int,
     *     page: int,
     *     total: int,
     *     lastPage: int,
     *     nextCursor: string|null,
     *     previousCursor: string|null
     * } $pagination
     */
    public function __construct(
        public array $records,
        public array $pagination,
    ) {}

    /**
     * @return array{
     *     records: list<array<string, mixed>>,
     *     pagination: array{
     *         enabled: bool,
     *         perPage: int,
     *         page: int,
     *         total: int,
     *         lastPage: int,
     *         nextCursor: string|null,
     *         previousCursor: string|null
     *     }
     * }
     */
    public function toArray(): array
    {
        return [
            'records' => $this->records,
            'pagination' => $this->pagination,
        ];
    }
}
