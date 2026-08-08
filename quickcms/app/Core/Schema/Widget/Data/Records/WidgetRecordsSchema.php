<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Records;

use App\Core\Schema\Schema;

final class WidgetRecordsSchema extends Schema
{
    protected mixed $records = null;

    public function records(
        mixed $records,
    ): static {
        return $this->with(
            'records',
            $records,
        );
    }

    public function recordsValue(): mixed
    {
        return $this->records;
    }
}
