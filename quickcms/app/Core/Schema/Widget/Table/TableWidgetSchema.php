<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Table;

use App\Core\Schema\Widget\WidgetSchema;

final class TableWidgetSchema extends WidgetSchema
{
    /**
     * @var array<int, array<string, mixed>>|null
     */
    protected array|null $tableColumns = null;

    protected string|null $rowKey = null;

    /**
     * @param array<int, array<string, mixed>>|null $columns
     */
    public function tableColumns(
        ?array $columns,
    ): static {
        return $this->with(
            'tableColumns',
            $columns,
        );
    }

    public function rowKey(
        ?string $rowKey,
    ): static {
        return $this->with(
            'rowKey',
            $rowKey,
        );
    }

    /**
     * @return array<int, array<string, mixed>>|null
     */
    public function tableColumnsValue(): ?array
    {
        return $this->tableColumns;
    }

    public function rowKeyValue(): ?string
    {
        return $this->rowKey;
    }
}
