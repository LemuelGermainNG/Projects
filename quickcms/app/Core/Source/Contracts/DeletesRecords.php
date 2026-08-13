<?php

declare(strict_types=1);

namespace App\Core\Source\Contracts;

use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;

interface DeletesRecords
{
    public function delete(
        string|int $id,
        SourceRequest $request,
    ): SourceResult;
}
