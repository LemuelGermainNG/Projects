<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Action\ActionSchema;
use App\Core\Schema\Element\Filter\FilterSchema;
use App\Core\Schema\Form\State\StateSchema;

trait HasDashboardContext
{
    protected StateSchema|null $state = null;

    /**
     * @var list<FilterSchema>
     */
    protected array $filters = [];

    /**
     * @var list<ActionSchema>
     */
    protected array $actions = [];

    protected bool|array|null $refresh = null;

    public function state(
        ?StateSchema $state,
    ): static {
        return $this->with(
            'state',
            $state,
        );
    }

    public function stateSchema(): ?StateSchema
    {
        return $this->state;
    }

    public function hasState(): bool
    {
        return $this->state !== null;
    }

    /**
     * @param list<FilterSchema> $filters
     */
    public function filters(
        array $filters,
    ): static {
        return $this->with(
            'filters',
            $filters,
        );
    }

    /**
     * @return list<FilterSchema>
     */
    public function filterSchemas(): array
    {
        return $this->filters;
    }

    public function hasFilters(): bool
    {
        return $this->filters !== [];
    }

    /**
     * @param list<ActionSchema> $actions
     */
    public function actions(
        array $actions,
    ): static {
        return $this->with(
            'actions',
            $actions,
        );
    }

    /**
     * @return list<ActionSchema>
     */
    public function actionSchemas(): array
    {
        return $this->actions;
    }

    public function hasActions(): bool
    {
        return $this->actions !== [];
    }

    public function refresh(
        bool|array|null $refresh,
    ): static {
        return $this->with(
            'refresh',
            $refresh,
        );
    }

    public function refreshValue(): bool|array|null
    {
        return $this->refresh;
    }

    public function hasRefresh(): bool
    {
        return $this->refresh !== null;
    }
}
