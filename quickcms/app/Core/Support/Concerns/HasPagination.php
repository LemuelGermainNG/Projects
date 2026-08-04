<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Element\Pagination\PaginationSchema;

trait HasPagination
{
    protected ?PaginationSchema $pagination = null;

    public function pagination(
        ?PaginationSchema $pagination = null,
    ): PaginationSchema|static|null {
        if (func_num_args() === 0) {
            return $this->pagination;
        }

        return $this->with('pagination',$pagination,);
    }
}
