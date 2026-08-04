<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Action\ActionSchema;

trait HasHeaderActions
{
    /**
     * @var array<int, ActionSchema>
     */
    protected array $headerActions = [];

    /**
     * @param array<int, ActionSchema>|null $actions
     *
     * @return array<int, ActionSchema>|static
     */
    public function headerActions(?array $actions = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->headerActions;
        }

        return $this->with(
            'headerActions',
            $actions,
        );
    }
}
