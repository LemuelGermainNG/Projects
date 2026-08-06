<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use Closure;

trait HasAcceptedFileTypes
{
    protected array|Closure|null $acceptedFileTypes = null;

    public function acceptedFileTypes(
        array|Closure|null $types = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->acceptedFileTypes;
        }

        return $this->with(
            'acceptedFileTypes',
            $types,
        );
    }
}
