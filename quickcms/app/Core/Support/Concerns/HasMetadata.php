<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

trait HasMetadata
{
    /**
     * @var array<string,mixed>
     */
    protected array $metadata = [];

    /**
     * @param array<string,mixed> $metadata
     *
     * @return array<string,mixed>|static
     */
    public function metadata(
        array $metadata = [],
    ): array|static {
        if (func_num_args() === 0) {
            return $this->metadata;
        }

        return $this->with(
            'metadata',
            $metadata,
        );
    }
}
