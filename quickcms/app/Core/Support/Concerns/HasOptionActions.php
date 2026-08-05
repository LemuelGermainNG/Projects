<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Enum\Option\OptionAction;
use App\Core\Schema\Action\ActionSchema;
use Closure;

trait HasOptionActions
{
    /**
     * @var array<int, ActionSchema>|Closure|null
     */
    protected array|Closure|null $optionActions = null;

    /**
     * @param array<int, ActionSchema>|Closure|null $actions
     *
     * @return array<int, ActionSchema>|Closure|null|static
     */
    public function optionActions(
        array|Closure|null $actions = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->optionActions;
        }

        return $this->with(
            'optionActions',
            $actions,
        );
    }

    protected function pushOptionAction(
        OptionAction $name,
        ActionSchema $action,
    ): static {
        $actions = $this->optionActions();

        if (! is_array($actions)) {
            $actions = [];
        }

        $actions[] = $action->name(
            $name->value,
        );

        return $this->optionActions(
            $actions,
        );
    }

    public function createOption(
        ActionSchema $action,
    ): static {
        return $this->pushOptionAction(
            OptionAction::Create,
            $action,
        );
    }

    public function editOption(
        ActionSchema $action,
    ): static {
        return $this->pushOptionAction(
            OptionAction::Edit,
            $action,
        );
    }

    public function viewOption(
        ActionSchema $action,
    ): static {
        return $this->pushOptionAction(
            OptionAction::View,
            $action,
        );
    }

    public function deleteOption(
        ActionSchema $action,
    ): static {
        return $this->pushOptionAction(
            OptionAction::Delete,
            $action,
        );
    }
}
