<?php

declare(strict_types=1);

namespace App\Core\Schema\Brand;

use App\Core\Schema\Schema;

final class BrandSchema extends Schema
{
    protected string $name = '';

    protected ?string $logo = null;

    protected ?string $favicon = null;

    public function name(?string $name = null): string|static
    {
        if (func_num_args() === 0) {
            return $this->name;
        }

        return $this->with('name', $name);
    }

    public function logo(?string $logo = null): string|static|null
    {
        if (func_num_args() === 0) {
            return $this->logo;
        }

        return $this->with('logo', $logo);
    }

    public function favicon(?string $favicon = null): string|static|null
    {
        if (func_num_args() === 0) {
            return $this->favicon;
        }

        return $this->with('favicon', $favicon);
    }
}
