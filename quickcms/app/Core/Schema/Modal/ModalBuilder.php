<?php

declare(strict_types=1);

namespace App\Core\Schema\Modal;

use App\Core\Builder\Builder;
use App\Core\Schema\Schema;

final class ModalBuilder extends Builder
{
    public static function schema(): string
    {
        return ModalSchema::class;
    }

    public function build(): array
    {
        $values = $this->schema->values();

        $values['content'] = $this->compileContent(
            $values['content'] ?? null,
        );

        return [
            'type' => 'modal',
            ...$values,
        ];
    }

    /**
     * Compile modal content.
     */
    protected function compileContent(
        Schema|string|array|null $content,
    ): Schema|string|array|null {
        if ($content instanceof Schema) {
            return $this->registry->build($content);
        }

        if (is_array($content)) {
            return array_map(
                fn (mixed $item): mixed => $item instanceof Schema
                    ? $this->registry->build($item)
                    : $item,
                $content,
            );
        }

        return $content;
    }
}
