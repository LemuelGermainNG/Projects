<?php

declare(strict_types=1);

namespace App\Core\Schema\Application;

use App\Core\Schema\Brand\BrandSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasProps;

final class ApplicationSchema extends Schema
{
    use HasProps;

    protected ?BrandSchema $brand = null;

    protected ?string $root = null;

    protected ?NavigationSchema $navigation = null;

    public function brand(
        ?BrandSchema $brand = null,
    ): BrandSchema|static|null {
        if (func_num_args() === 0) {
            return $this->brand;
        }

        return $this->with(
            'brand',
            $brand,
        );
    }

    public function root(
        ?string $root = null,
    ): string|static|null {
        if (func_num_args() === 0) {
            return $this->root;
        }

        return $this->with(
            'root',
            $root,
        );
    }

    public function navigation(
        ?NavigationSchema $navigation = null,
    ): NavigationSchema|static|null {
        if (func_num_args() === 0) {
            return $this->navigation;
        }

        return $this->with(
            'navigation',
            $navigation,
        );
    }
}
