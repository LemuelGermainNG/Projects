<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\ColorPicker;

use App\Core\Schema\Form\Base\BaseInputBuilder;

final class ColorPickerBuilder extends BaseInputBuilder
{
    public static function schema(): string
    {
        return ColorPickerSchema::class;
    }

    public function build(): array
    {
        /** @var ColorPickerSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'alpha',
            $this->evaluate(
                $schema->isAlpha(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'format',
            $this->evaluateEnum(
                $schema->format(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'palette',
            $this->evaluate(
                $schema->palette(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'swatches',
            $this->evaluate(
                $schema->isSwatches(),
            ),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
