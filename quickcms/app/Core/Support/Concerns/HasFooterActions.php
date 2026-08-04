<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Action\ActionSchema;

trait HasFooterActions
{
    /**
     * @var array<int, ActionSchema>
     */
    protected array $footerActions = [];

    /**
     * @param array<int, ActionSchema>|null $actions
     *
     * @return array<int, ActionSchema>|static
     */
    public function footerActions(?array $actions = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->footerActions;
        }

        return $this->with(
            'footerActions',
            $actions,
        );
    }
}
