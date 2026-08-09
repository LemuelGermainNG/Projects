<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard\Layout;

use App\Core\Schema\Schema;
use App\Core\Schema\Widget\WidgetSchema;
use App\Core\Support\Concerns\HasProps;

final class DashboardColumnSchema extends Schema
{
    use HasProps;

    protected WidgetSchema|null $widget = null;

    protected int|array|null $width = null;

    public function widget(
        ?WidgetSchema $widget,
    ): static {
        return $this->with(
            'widget',
            $widget,
        );
    }

    public function width(
        int|array|null $width,
    ): static {
        return $this->with(
            'width',
            $width,
        );
    }

    public function widgetValue(): ?WidgetSchema
    {
        return $this->widget;
    }

    public function widthValue(): int|array|null
    {
        return $this->width;
    }

    public function hasWidget(): bool
    {
        return $this->widget !== null;
    }
}
