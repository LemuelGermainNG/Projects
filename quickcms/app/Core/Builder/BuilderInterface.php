<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;

interface BuilderInterface
{
    /**
     * Returns the schema handled by this builder.
     *
     * @return class-string<Schema>
     */
    public static function schema(): string;

    /**
     * Compile the schema.
     */
    public function build(): array;
}
