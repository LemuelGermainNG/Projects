<?php

declare(strict_types=1);

namespace App\Core\Schema\Action;

use App\Core\Schema\Schema;
use App\Core\Schema\Action\Concerns\CanDispatchEvent;
use App\Core\Schema\Action\Concerns\CanOpenModal;
use App\Core\Schema\Action\Concerns\CanRequireConfirmation;
use App\Core\Schema\Action\Enums\ActionTrigger;
use App\Core\Schema\Action\Enums\ActionType;
use App\Core\Support\Concerns\HasAttributes;
use App\Core\Support\Concerns\HasColor;
use App\Core\Support\Concerns\HasDisabled;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasId;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasName;
use App\Core\Support\Concerns\HasSize;
use App\Core\Support\Concerns\HasTarget;
use App\Core\Support\Concerns\HasTooltip;
use App\Core\Support\Concerns\HasUrl;
use App\Core\Support\Concerns\HasVisible;

class ActionSchema extends Schema
{
    use HasId;
    use HasName;
    use HasLabel;
    use HasIcon;
    use HasTooltip;
    use HasVisible;
    use HasDisabled;
    use HasAttributes;
    use HasUrl;

    use HasColor;
    use HasSize;
    use HasTarget;

    use CanOpenModal;
    use CanRequireConfirmation;
    use CanDispatchEvent;

    /**
     * Action type.
     */
    protected ActionType $type = ActionType::Button;

    /**
     * Action trigger.
     */
    protected ActionTrigger $trigger = ActionTrigger::Request;

    public function type(?ActionType $type = null): ActionType|static
    {
        if ($type === null) {
            return $this->type;
        }

        $this->type = $type;

        return $this;
    }

    public function trigger(?ActionTrigger $trigger = null): ActionTrigger|static
    {
        if ($trigger === null) {
            return $this->trigger;
        }

        $this->trigger = $trigger;

        return $this;
    }
}
