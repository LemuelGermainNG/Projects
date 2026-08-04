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

            'schema' => $this->compileSchema(
                $schema->schema(),
            ),

            'headerActions' => $this->compileSchema(
                $schema->headerActions(),
            ),

            'footerActions' => $this->compileSchema(
                $schema->footerActions(),
            ),

            'props' => $schema->props(),
        ];
    }
}
