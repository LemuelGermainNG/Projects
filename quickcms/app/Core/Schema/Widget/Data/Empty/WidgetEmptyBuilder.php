<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Empty;

use App\Core\Builder\Builder;

final class WidgetEmptyBuilder extends Builder
{
    public static function schema(): string
    {
        return WidgetEmptySchema::class;
    }

    public function build(): array
    {
        /** @var WidgetEmptySchema $schema */
        $schema = $this->schema;

        $data = [];

        $message = $this->evaluate(
            $schema->messageValue(),
        );

        if ($message !== null) {
            $data['message'] = $message;
        }

        $icon = $this->evaluate(
            $schema->iconValue(),
        );

        if ($icon !== null) {
            $data['icon'] = $icon;
        }

        return $data;
    }
}
