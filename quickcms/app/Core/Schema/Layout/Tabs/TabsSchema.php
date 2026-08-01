<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Tabs;

use App\Core\Schema\Layout\LayoutSchema;

final class TabsSchema extends LayoutSchema
{
    /**
     * @return array<int, TabSchema>
     */
    public function tabs(): array
    {
        /** @var array<int, TabSchema> */
        return $this->children();
    }
}
