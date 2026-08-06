<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Validation;

use App\Core\Builder\Builder;

final class ValidationRulesBuilder extends Builder
{
    public static function schema(): string
    {
        return ValidationRules::class;
    }

    public function build(): array
    {
        /** @var ValidationRules $schema */
        $schema = $this->schema;

        return [
            'rules' => $this->compileCollection(
                $schema->rules(),
            ),
        ];
    }
}
