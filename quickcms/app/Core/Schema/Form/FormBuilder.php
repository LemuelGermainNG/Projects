<?php

declare(strict_types=1);

namespace App\Core\Schema\Form;

use App\Core\Builder\Builder;

final class FormBuilder extends Builder
{
    public static function schema(): string
    {
        return FormSchema::class;
    }

    public function build(): array
    {
        /** @var FormSchema $schema */
        $schema = $this->schema;

        return [
            'type' => 'form',

            'source' => $schema->source(),

            'schema' => $this->compileSchemas(
                $schema->schema(),
            ),

            'headerActions' => $this->compileSchemas(
                $schema->headerActions(),
            ),

            'footerActions' => $this->compileSchemas(
                $schema->footerActions(),
            ),

            'props' => $schema->props(),
        ];
    }
}
