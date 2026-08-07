<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation;

use App\Core\Builder\Builder;

final class ValidationRulesBuilder extends Builder
{
    public static function schema(): string
    {
        return Validation::class;
    }

    public function build(): array
    {
        /** @var Validation $schema */
        $schema = $this->schema;

        return [
            'rules' => $this->compileCollection(
                $schema->rules(),
            ),
        ];
    }
}
