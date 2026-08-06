<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\File;

use App\Core\Bridge\Spatie\MediaLibrary\Support\Conversion;
use Closure;

trait HasConversions
{
    /**
     * @var array<int, Conversion|string>|Closure|null
     */
    protected array|Closure|null $conversions = null;

    /**
     * @param array<int, Conversion|string>|Closure|null $conversions
     *
     * @return array<int, Conversion|string>|Closure|static|null
     */
    public function conversions(
        array|Closure|null $conversions = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->conversions;
        }

        return $this->with(
            'conversions',
            $conversions,
        );
    }
}
