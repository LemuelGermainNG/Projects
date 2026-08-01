<?php

declare(strict_types=1);

namespace App\Core\Builder\Layout;

use App\Core\Builder\Builder;

abstract class ChildrenLayoutBuilder extends Builder
{
    /**
     * Compile children schemas.
     *
     * @param array $children
     */
    protected function buildChildren(array $children): array
    {
        return array_map(
            fn ($child) => $this->registry->build(
                $child,
                $this->context,
            ),
            $children,
        );
    }
}
