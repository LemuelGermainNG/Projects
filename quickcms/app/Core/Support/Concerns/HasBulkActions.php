<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Action\ActionSchema;

trait HasBulkActions
{
    /**
     * @var array<int, ActionSchema>
     */
    protected array $bulkActions = [];

    /**
     * @param array<int, ActionSchema>|null $actions
     *
     * @return array<int, ActionSchema>|static
     */
    public function bulkActions(?array $actions = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->bulkActions;
        }

        return $this->with(
            'bulkActions',
            $actions,
        );
    }
}
