<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Schema;

trait HasSchema
{
    /**
     * @var array<int, Schema>
     */
    protected array $schema = [];

    /**
     * @param array<int, Schema>|null $schema
     *
     * @return array<int, Schema>|static
     */
    public function schema(?array $schema = null): array|static
    {
        if ($schema === null) {
            return $this->schema;
        }

        return $this->with('schema', $schema);
    }
}
