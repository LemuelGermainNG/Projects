<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation\Rule\Parameter;

use Closure;

final class DimensionsParameters extends RuleParameters
{
    public function __construct(
        protected int|Closure|null $minWidth = null,
        protected int|Closure|null $minHeight = null,
        protected int|Closure|null $maxWidth = null,
        protected int|Closure|null $maxHeight = null,
        protected float|Closure|null $ratio = null,
    ) {
    }

    public static function make(): static
    {
        return new static();
    }

    public function minWidth(
        int|Closure|null $value,
    ): static {
        return $this->with(
            'minWidth',
            $value,
        );
    }

    public function minHeight(
        int|Closure|null $value,
    ): static {
        return $this->with(
            'minHeight',
            $value,
        );
    }

    public function maxWidth(
        int|Closure|null $value,
    ): static {
        return $this->with(
            'maxWidth',
            $value,
        );
    }

    public function maxHeight(
        int|Closure|null $value,
    ): static {
        return $this->with(
            'maxHeight',
            $value,
        );
    }

    public function ratio(
        float|Closure|null $value,
    ): static {
        return $this->with(
            'ratio',
            $value,
        );
    }
}
