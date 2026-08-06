<?php

declare(strict_types=1);

namespace App\Core\Builder;

use App\Core\Schema\Schema;
use BackedEnum;

final class ObjectBuilder extends Builder
{
    public static function schema(): string
    {
        return Schema::class;
    }

    public function build(): array
    {
        $data = [];

        foreach ($this->schema->properties() as $key => $value) {
            $value = $this->evaluate($value);

            if ($value instanceof Schema) {
                $value = $this->compileChild($value);
            } elseif (is_array($value)) {
                $value = $this->compileCollection($value);
            } elseif ($value instanceof BackedEnum) {
                $value = $value->value;
            }

            $this->addIfNotNull(
                $data,
                $key,
                $value,
            );
        }

        return $data;
    }
}
