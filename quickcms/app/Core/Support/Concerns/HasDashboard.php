<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Dashboard\Layout\DashboardLayoutSchema;

trait HasDashboard
{
    protected DashboardLayoutSchema|null $layout = null;

    public function layout(
        ?DashboardLayoutSchema $layout,
    ): static {
        return $this->with(
            'layout',
            $layout,
        );
    }

    public function layoutValue(): ?DashboardLayoutSchema
    {
        return $this->layout;
    }

    public function hasLayout(): bool
    {
        return $this->layout !== null;
    }
}
