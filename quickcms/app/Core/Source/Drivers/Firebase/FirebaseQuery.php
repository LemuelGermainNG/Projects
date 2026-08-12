<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers\Firebase;

use App\Core\Source\SourceRequest;
use Google\Cloud\Firestore\Query;
use InvalidArgumentException;

final class FirebaseQuery
{
    /**
     * @param list<string> $allowedFilters
     * @param list<string> $allowedSorts
     */
    public static function for(
        Query $query,
        SourceRequest $request,
        array $allowedFilters = [],
        array $allowedSorts = [],
    ): Query {
        foreach ($request->filters() as $field => $value) {
            if (! in_array($field, $allowedFilters, true)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Filter [%s] is not allowed.',
                        $field,
                    ),
                );
            }

            $query = $query->where(
                $field,
                '=',
                $value,
            );
        }

        foreach ($request->sorts() as $sort) {
            $field = $sort;
            $direction = 'ASCENDING';

            if (str_starts_with($field, '-')) {
                $direction = 'DESCENDING';
                $field = substr($field, 1);
            }

            if (! in_array($field, $allowedSorts, true)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Sort [%s] is not allowed.',
                        $field,
                    ),
                );
            }

            $query = $query->orderBy(
                $field,
                $direction,
            );
        }

        return $query;
    }
}
