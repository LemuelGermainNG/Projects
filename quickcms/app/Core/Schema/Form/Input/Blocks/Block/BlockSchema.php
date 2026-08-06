<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\Blocks\Block;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasDescription;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasLabel;
use App\Core\Support\Concerns\HasName;
use App\Core\Support\Concerns\HasSchema;

class BlockSchema extends Schema
{
    use HasDescription;
    use HasIcon;
    use HasLabel;
    use HasName;
    use HasSchema;
}
