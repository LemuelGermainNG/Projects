<?php

declare(strict_types=1);

namespace App\Core\Schema\Widget\Data\Loading;

use App\Core\Builder\Builder;

final class WidgetLoadingBuilder extends Builder
{
    public static function schema(): string
    {
        return WidgetLoadingSchema::class;
    }

    public function build(): array
    {
        /** @var WidgetLoadingSchema $schema */
        $schema = $this->schema;

        $data = [
            'enabled' => $this->evaluate(
                $schema->isEnabled(),
            ),
        ];

        $message = $this->evaluate(
            $schema->messageValue(),
        );

        if ($message !== null) {
            $data['message'] = $message;
        }

        return $data;
    }
}
