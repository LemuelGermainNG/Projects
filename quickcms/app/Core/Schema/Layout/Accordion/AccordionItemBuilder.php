<?php

declare(strict_types=1);

namespace App\Core\Schema\Layout\Accordion;

use App\Core\Builder\Builder;

final class AccordionItemBuilder extends Builder
{
    public const TYPE = 'accordion-item';

    public static function schema(): string
    {
        return AccordionItemSchema::class;
    }

    public function build(): array
    {
        /** @var AccordionItemSchema $schema */
        $schema = $this->schema;

        return [
            'type' => self::TYPE,

            'header' => $schema->header() !== null
                ? $this->registry->build(
                    $schema->header(),
                    $this->context,
                )
                : null,

            'visible' => $this->evaluate(
                $schema->isVisible(),
            ),

            'disabled' => $this->evaluate(
                $schema->isDisabled(),
            ),

            'child' => $schema->child() !== null
                ? $this->registry->build(
                    $schema->child(),
                    $this->context,
                )
                : null,

            'props' => $schema->props(),
        ];
    }
}
