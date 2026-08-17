<?php

declare(strict_types=1);

namespace App\Core\Page\Contracts;

use App\Core\Schema\Page\PageSchema;

interface Page
{
    /**
     * Returns the unique page identifier.
     */
    public function id(): string;

    /**
     * Returns the page schema.
     */
    public function content(): PageSchema;

    /**
     * Returns the page metadata.
     *
     * @return array<string, mixed>
     */
    public function metadata(): array;
}
