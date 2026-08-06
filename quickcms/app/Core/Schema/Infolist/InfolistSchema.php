<?php

declare(strict_types=1);

namespace App\Core\Schema\Infolist;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasSource;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasSchema;

final class InfolistSchema extends Schema
{
    use HasProps;
    use HasSchema;
    use HasSource;
}
