<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\KeyValue;

use App\Core\Schema\Form\Base\BaseInputSchema;
use App\Core\Support\Concerns\HasReorderable;
use App\Core\Support\Concerns\KeyValue\HasAddable;
use App\Core\Support\Concerns\KeyValue\HasDeletable;
use App\Core\Support\Concerns\KeyValue\HasEditableKeys;
use App\Core\Support\Concerns\KeyValue\HasEditableValues;
use App\Core\Support\Concerns\KeyValue\HasKeyLabel;
use App\Core\Support\Concerns\KeyValue\HasKeyPlaceholder;
use App\Core\Support\Concerns\KeyValue\HasValueLabel;
use App\Core\Support\Concerns\KeyValue\HasValuePlaceholder;
use App\Core\Support\Concerns\KeyValue\HasValueType;

final class KeyValueSchema extends BaseInputSchema
{
    use HasAddable;
    use HasDeletable;
    use HasEditableKeys;
    use HasEditableValues;
    use HasKeyLabel;
    use HasKeyPlaceholder;
    use HasReorderable;
    use HasValueLabel;
    use HasValuePlaceholder;
    use HasValueType;
}
