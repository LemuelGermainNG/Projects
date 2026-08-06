<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\ColorPicker;

use App\Core\Schema\Form\Base\BaseInputSchema;
use App\Core\Support\Concerns\HasFormat;
use App\Core\Support\Concerns\Color\HasAlpha;
use App\Core\Support\Concerns\Color\HasPalette;
use App\Core\Support\Concerns\Color\HasSwatches;

final class ColorPickerSchema extends BaseInputSchema
{
    use HasAlpha;
    use HasFormat;
    use HasPalette;
    use HasSwatches;
}
