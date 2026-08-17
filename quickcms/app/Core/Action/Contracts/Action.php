<?php

declare(strict_types=1);

namespace App\Core\Action\Contracts;

use App\Core\Schema\Action\ActionSchema;

interface Action
{
    /**
     * Returns the unique action identifier.
     */
    public function id(): string;

    /**
     * Returns the action schema.
     */
    public function schema(): ActionSchema;

    /**
     * Returns the action metadata.
     *
     * @return array<string, mixed>
     */
    public function metadata(): array;
}
