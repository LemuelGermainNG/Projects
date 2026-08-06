<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\KeyValue;

use App\Core\Schema\Schema;
use App\Core\Support\Enum\KeyValue\ValueType;
use Closure;

trait HasValueType
{
    protected ValueType|Schema|string|Closure|null $valueType = null;

    public function valueType(
        ValueType|Schema|string|Closure|null $type = null,
    ): ValueType|Schema|string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->valueType;
        }

        return $this->with(
            'valueType',
            $type,
        );
    }
}
