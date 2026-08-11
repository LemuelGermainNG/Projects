<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers;

use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use InvalidArgumentException;

final class ActionSource
{
    /**
     * @param class-string $action
     */
    public static function resolve(
        string $action,
        SourceRequest $request,
    ): SourceResult {
        $instance = app($action);

        $result = $instance->handle(
            $request,
        );

        if (!$result instanceof SourceResult) {
            throw new InvalidArgumentException(
                sprintf(
                    'Action [%s] must return [%s].',
                    $action,
                    SourceResult::class,
                ),
            );
        }

        return $result;
    }
}
