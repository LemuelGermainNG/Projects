<?php

declare(strict_types=1);

namespace App\Core\Schema\Application;

use App\Core\Schema\Brand\BrandSchema;
use App\Core\Schema\Schema;

final class ApplicationSchema extends Schema
{
    public function __construct(
        protected ?BrandSchema $brand = null,
        protected array $props = [],
        protected array $pages = [],
        protected array $navigation = [],
    ) {
    }

    public static function make(): self
    {
        return new self();
    }

    public function brand(BrandSchema $brand): self
    {
        $clone = clone $this;

        $clone->brand = $brand;

        return $clone;
    }

    public function props(array $props): self
    {
        $clone = clone $this;

        $clone->props = $props;

        return $clone;
    }

    public function pages(array $pages): self
    {
        $clone = clone $this;

        $clone->pages = $pages;

        return $clone;
    }

    public function navigation(array $navigation): self
    {
        $clone = clone $this;

        $clone->navigation = $navigation;

        return $clone;
    }

    public function toArray(): array
    {
        return [
            'brand' => $this->brand,
            'props' => $this->props,
            'pages' => $this->pages,
            'navigation' => $this->navigation,
        ];
    }
}
