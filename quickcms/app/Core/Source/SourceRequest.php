<?php

declare(strict_types=1);

namespace App\Core\Source;

use Illuminate\Http\Request;

final readonly class SourceRequest
{
    /**
     * @param  array<string, mixed>  $query
     */
    public function __construct(
        public int $page = 1,
        public int $perPage = 20,
        public array $query = [],
    ) {}

    public function get(
        string $key,
        mixed $default = null,
    ): mixed {
        return $this->query[$key] ?? $default;
    }

    /**
     * @return array<string, mixed>
     */
    public function filters(): array
    {
        $filters = $this->query['filter'] ?? [];

        return is_array($filters)
            ? $filters
            : [];
    }

    /**
     * @return list<string>
     */
    public function sorts(): array
    {
        $sort = $this->query['sort'] ?? null;

        if ($sort === null || $sort === '') {
            return [];
        }

        if (is_array($sort)) {
            return array_values(
                array_filter(
                    array_map(
                        static fn (mixed $value): string => (string) $value,
                        $sort,
                    ),
                    static fn (string $value): bool => $value !== '',
                ),
            );
        }

        return array_values(
            array_filter(
                array_map(
                    static fn (string $value): string => trim($value),
                    explode(',', (string) $sort),
                ),
                static fn (string $value): bool => $value !== '',
            ),
        );
    }

    public function cursor(): ?string
    {
        $cursor = $this->query['cursor'] ?? null;

        return is_string($cursor) && $cursor !== ''
            ? $cursor
            : null;
    }

    public function hasCursor(): bool
    {
        return $this->cursor() !== null;
    }

    public function toHttpRequest(): Request
    {
        return Request::create(
            uri: '/',
            method: 'GET',
            parameters: $this->query,
        );
    }
}
