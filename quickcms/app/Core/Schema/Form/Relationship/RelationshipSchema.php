<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Relationship;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasAppends;
use App\Core\Support\Concerns\HasCache;
use App\Core\Support\Concerns\HasFilters;
use App\Core\Support\Concerns\HasIncludes;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasLimit;
use App\Core\Support\Concerns\HasOptionActions;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasSearch;
use App\Core\Support\Concerns\HasSort;
use App\Core\Support\Concerns\HasSource;
use App\Core\Support\Concerns\HasValue;

final class RelationshipSchema extends Schema
{
    use HasAppends;
    use HasCache;
    use HasFilters;
    use HasIncludes;
    use HasLabel;
    use HasLimit;
    use HasOptionActions;
    use HasProps;
    use HasSearch;
    use HasSort;
    use HasSource;
    use HasValue;
}
