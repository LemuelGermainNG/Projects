<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers\Firebase;

use App\Core\Source\SourceRequest;
use Google\Cloud\Firestore\CollectionReference;
use Google\Cloud\Firestore\Query;
use InvalidArgumentException;
use JsonException;

final class FirebaseQuery
{
    /**
     * @param  list<string>  $allowedFilters
     * @param  list<string>  $allowedSorts
     */
    public static function for(
        CollectionReference $query,
        SourceRequest $request,
        array $allowedFilters = [],
        array $allowedSorts = [],
    ): Query {
        $query = self::applyFilters(
            query: $query,
            request: $request,
            allowedFilters: $allowedFilters,
        );

        $query = self::applySorts(
            query: $query,
            request: $request,
            allowedSorts: $allowedSorts,
        );

        if ($request->hasCursor()) {
            $query = $query->startAfter(
                self::decodeCursor(
                    $request->cursor(),
                ),
            );
        }

        return $query;
    }

    /**
     * @param  list<string>  $allowedFilters
     */
    private static function applyFilters(
        CollectionReference|Query $query,
        SourceRequest $request,
        array $allowedFilters,
    ): CollectionReference|Query {
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

        return $query;
    }

    /**
     * @param  list<string>  $allowedSorts
     */
    private static function applySorts(
        CollectionReference|Query $query,
        SourceRequest $request,
        array $allowedSorts,
    ): Query {
        $sorts = $request->sorts();

        if ($sorts === []) {
            return $query->orderBy(
                '__name__',
                'ASCENDING',
            );
        }

        foreach ($sorts as $sort) {
            if ($sort === '') {
                continue;
            }

            $direction = 'ASCENDING';

            if (str_starts_with($sort, '-')) {
                $direction = 'DESCENDING';
                $sort = substr($sort, 1);
            }

            if (! in_array($sort, $allowedSorts, true)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Sort [%s] is not allowed.',
                        $sort,
                    ),
                );
            }

            $query = $query->orderBy(
                $sort,
                $direction,
            );
        }

        return $query->orderBy(
            '__name__',
            'ASCENDING',
        );
    }

    /**
     * @param  list<mixed>  $values
     */
    public static function encodeCursor(
        array $values,
    ): string {
        try {
            $json = json_encode(
                $values,
                JSON_THROW_ON_ERROR,
            );
        } catch (JsonException) {
            throw new InvalidArgumentException(
                'Unable to encode pagination cursor.',
            );
        }

        return rtrim(
            strtr(
                base64_encode($json),
                '+/',
                '-_',
            ),
            '=',
        );
    }

    /**
     * @return list<mixed>
     */
    public static function decodeCursor(
        ?string $cursor,
    ): array {
        if ($cursor === null || $cursor === '') {
            return [];
        }

        $decoded = base64_decode(
            strtr(
                $cursor,
                '-_',
                '+/',
            ),
            true,
        );

        if ($decoded === false) {
            throw new InvalidArgumentException(
                'Invalid pagination cursor.',
            );
        }

        try {
            $values = json_decode(
                $decoded,
                true,
                512,
                JSON_THROW_ON_ERROR,
            );
        } catch (JsonException) {
            throw new InvalidArgumentException(
                'Invalid pagination cursor.',
            );
        }

        if (! is_array($values)) {
            throw new InvalidArgumentException(
                'Invalid pagination cursor.',
            );
        }

        return array_values($values);
    }
}
