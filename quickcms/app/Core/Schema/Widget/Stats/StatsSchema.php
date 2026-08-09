<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Stats;

use App\Core\Schema\Widget\WidgetSchema;

final class StatsSchema extends WidgetSchema
{
    protected mixed $value = null;

    protected mixed $trend = null;

    public function value(
        mixed $value,
    ): static {
        return $this->with(
            'value',
            $value,
        );
    }

    public function trend(
        mixed $trend,
    ): static {
        return $this->with(
            'trend',
            $trend,
        );
    }

    public function valueValue(): mixed
    {
        return $this->value;
    }

    public function trendValue(): mixed
    {
        return $this->trend;
    }
}
