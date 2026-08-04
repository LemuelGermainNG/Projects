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

        return [
            'type' => $this->type(),

            'title' => $values['title'],
            'description' => $values['description'],

            'size' => $values['size'],
            'position' => $values['position'],

            'closable' => $values['closable'],
            'closeOnEscape' => $values['closeOnEscape'],
            'closeOnBackdrop' => $values['closeOnBackdrop'],

            'stickyHeader' => $values['stickyHeader'],
            'stickyFooter' => $values['stickyFooter'],

            'content' => $this->compileContent(
                $values['content'] ?? null,
            ),

            'props' => $values['props'],
        ];
    }

    /**
     * Compile modal content.
     */
    protected function compileContent(
        Schema|string|array|null $content,
    ): Schema|string|array|null {
        if ($content instanceof Schema) {
            return $this->registry->build(
                $content,
                $this->context,
            );
        }

        if (is_array($content)) {
            return array_map(
                fn (mixed $item): mixed => $item instanceof Schema
                    ? $this->registry->build(
                        $item,
                        $this->context,
                    )
                    : $item,
                $content,
            );
        }

        return $content;
    }
}
