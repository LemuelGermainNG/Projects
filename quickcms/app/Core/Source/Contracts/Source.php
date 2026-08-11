<?php

declare(strict_types=1);

namespace App\Core\Source\Contracts;

use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;

interface Source
{
    public static function name(): string;

    public function resolve(
        SourceRequest $request,
    ): SourceResult;
}
