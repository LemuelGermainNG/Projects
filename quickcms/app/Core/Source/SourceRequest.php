<?php

declare(strict_types=1);

namespace App\Core\Source;

use Illuminate\Http\Request;

final readonly class SourceRequest
{
    /**
     * @param array<string, mixed> $query
     */
    public function __construct(
        public int $page = 1,
        public int $perPage = 20,
        public array $query = [],
    ) {
    }

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
        $sort = $this->query['sort'] ?? [];

        if (is_string($sort)) {
            return [$sort];
        }

        return is_array($sort)
            ? array_values($sort)
            : [];
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
