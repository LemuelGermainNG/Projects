<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget;

use App\Core\Schema\Schema;
use App\Core\Schema\Widget\Data\WidgetDataSchema;
use App\Core\Support\Concerns\HasColumns;
use App\Core\Support\Concerns\HasDescription;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasSource;
use App\Core\Support\Concerns\HasTitle;
use App\Core\Support\Concerns\HasVisible;
use App\Core\Support\Concerns\HasWidth;

class WidgetSchema extends Schema
{
    use HasColumns;
    use HasDescription;
    use HasIcon;
    use HasProps;
    use HasSource;
    use HasTitle;
    use HasVisible;
    use HasWidth;

    protected string|array|null $key = null;

    protected WidgetDataSchema|null $data = null;

    public function key(
        string|array|null $key,
    ): static {
        return $this->with(
            'key',
            $key,
        );
    }

    public function data(
        WidgetDataSchema $data,
    ): static {
        return $this->with(
            'data',
            $data,
        );
    }

    public function widgetKey(): string|array|null
    {
        return $this->key;
    }

    public function dataSchema(): ?WidgetDataSchema
    {
        return $this->data;
    }
}
