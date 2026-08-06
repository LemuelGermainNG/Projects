<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Form\Validation\ValidationRules;
use Closure;

trait HasValidation
{
    protected ValidationRules|Closure|null $validation = null;

    public function validation(
        ValidationRules|Closure|null $validation = null,
    ): ValidationRules|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->validation;
        }

        return $this->with(
            'validation',
            $validation,
        );
    }
}
