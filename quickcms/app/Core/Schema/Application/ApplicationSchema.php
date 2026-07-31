<?php

declare(strict_types=1);

namespace App\Core\Schema\Application;

use App\Core\Schema\Brand\BrandSchema;
use App\Core\Schema\Navigation\NavigationSchema;
use App\Core\Schema\Page\PageSchema;
use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasProps;

final class ApplicationSchema extends Schema
{
    use HasProps;

    protected ?BrandSchema $brand = null;

    /**
     * @var list<PageSchema>
     */
    protected array $pages = [];

    /**
     * @var list<NavigationSchema>
     */
    protected array $navigation = [];

    public function brand(?BrandSchema $brand = null): BrandSchema|static|null
    {
        if (func_num_args() === 0) {
            return $this->brand;
        }

        return $this->with('brand', $brand);
    }

    /**
     * @param list<PageSchema>|null $pages
     *
     * @return list<PageSchema>|static
     */
    public function pages(?array $pages = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->pages;
        }

        return $this->with('pages', $pages);
    }

    /**
     * @param list<NavigationSchema>|null $navigation
     *
     * @return list<NavigationSchema>|static
     */
    public function navigation(?array $navigation = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->navigation;
        }

        return $this->with('navigation', $navigation);
    }
}
