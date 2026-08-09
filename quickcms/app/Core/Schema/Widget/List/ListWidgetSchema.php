<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\List;

use App\Core\Schema\Widget\WidgetSchema;

final class ListWidgetSchema extends WidgetSchema
{
    protected string|null $itemKey = null;

    protected string|null $itemTitle = null;

    protected string|null $itemDescription = null;

    protected string|null $itemIcon = null;

    protected string|null $itemValue = null;

    protected string|null $itemTrend = null;

    protected string|null $itemMeta = null;

    protected array|null $items = null;

    protected array|null $filters = null;

    public function itemKey(
        ?string $itemKey,
    ): static {
        return $this->with(
            'itemKey',
            $itemKey,
        );
    }

    public function itemTitle(
        ?string $itemTitle,
    ): static {
        return $this->with(
            'itemTitle',
            $itemTitle,
        );
    }

    public function itemDescription(
        ?string $itemDescription,
    ): static {
        return $this->with(
            'itemDescription',
            $itemDescription,
        );
    }

    public function itemIcon(
        ?string $itemIcon,
    ): static {
        return $this->with(
            'itemIcon',
            $itemIcon,
        );
    }

    public function itemValue(
        ?string $itemValue,
    ): static {
        return $this->with(
            'itemValue',
            $itemValue,
        );
    }

    public function itemTrend(
        ?string $itemTrend,
    ): static {
        return $this->with(
            'itemTrend',
            $itemTrend,
        );
    }

    public function itemMeta(
        ?string $itemMeta,
    ): static {
        return $this->with(
            'itemMeta',
            $itemMeta,
        );
    }

    public function items(
        ?array $items,
    ): static {
        return $this->with(
            'items',
            $items,
        );
    }

    public function filters(
        ?array $filters,
    ): static {
        return $this->with(
            'filters',
            $filters,
        );
    }

    public function itemKeyValue(): ?string
    {
        return $this->itemKey;
    }

    public function itemTitleValue(): ?string
    {
        return $this->itemTitle;
    }

    public function itemDescriptionValue(): ?string
    {
        return $this->itemDescription;
    }

    public function itemIconValue(): ?string
    {
        return $this->itemIcon;
    }

    public function itemValueValue(): ?string
    {
        return $this->itemValue;
    }

    public function itemTrendValue(): ?string
    {
        return $this->itemTrend;
    }

    public function itemMetaValue(): ?string
    {
        return $this->itemMeta;
    }

    public function itemsValue(): ?array
    {
        return $this->items;
    }

    public function filtersValue(): ?array
    {
        return $this->filters;
    }
}
