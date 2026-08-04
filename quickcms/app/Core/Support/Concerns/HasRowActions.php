<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Action\ActionSchema;

trait HasRowActions
{
    /**
     * @var array<int, ActionSchema>
     */
    protected array $rowActions = [];

    /**
     * @param array<int, ActionSchema>|null $actions
     *
     * @return array<int, ActionSchema>|static
     */
    public function rowActions(?array $actions = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->rowActions;
        }

        return $this->with(
            'rowActions',
            $actions,
        );
    }
}
