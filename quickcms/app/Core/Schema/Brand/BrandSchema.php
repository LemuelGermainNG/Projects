<?php

declare(strict_types=1);

namespace App\Core\Schema\Brand;

use App\Core\Schema\Schema;

final class BrandSchema extends Schema
{
    public function __construct(
        protected string $name = '',
        protected ?string $logo = null,
        protected ?string $favicon = null,
    ) {
    }

    public static function make(): self
    {
        return new self();
    }

    public function name(string $name): self
    {
        $clone = clone $this;

        $clone->name = $name;

        return $clone;
    }

    public function logo(?string $logo): self
    {
        $clone = clone $this;

        $clone->logo = $logo;

        return $clone;
    }

    public function favicon(?string $favicon): self
    {
        $clone = clone $this;

        $clone->favicon = $favicon;

        return $clone;
    }
}
