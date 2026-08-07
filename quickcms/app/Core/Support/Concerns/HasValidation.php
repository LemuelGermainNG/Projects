<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Form\Validation\Validation;
use Closure;

trait HasValidation
{
    protected Validation|Closure|null $validation = null;

    public function validation(
        Validation|Closure|null $validation = null,
    ): Validation|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->validation;
        }

        return $this->with(
            'validation',
            $validation,
        );
    }
}
