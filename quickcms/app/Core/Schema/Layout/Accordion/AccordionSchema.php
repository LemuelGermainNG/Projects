<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Accordion;

use App\Core\Schema\Layout\LayoutSchema;

final class AccordionSchema extends LayoutSchema
{
    /**
     * @return array<int, AccordionItemSchema>
     */
    public function items(): array
    {
        /** @var array<int, AccordionItemSchema> */
        return $this->children();
    }

    /**
     * @param array<int, AccordionItemSchema> $items
     */
    public function withItems(array $items): static
    {
        return $this->children($items);
    }
}
