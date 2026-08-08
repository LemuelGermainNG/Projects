<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Widget\WidgetSchema;
use Closure;

trait HasWidget
{
    protected WidgetSchema|Closure|null $widget = null;

    public function widget(
        WidgetSchema|Closure|null $widget,
    ): static {
        return $this->with(
            'widget',
            $widget,
        );
    }

    public function widgetSchema(): WidgetSchema|Closure|null
    {
        return $this->widget;
    }
}
