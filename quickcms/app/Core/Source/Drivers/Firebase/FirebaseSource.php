<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers\Firebase;

use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use Kreait\Firebase\Contract\Firestore;
use Spatie\LaravelData\Data;

final class FirebaseSource
{
    /**
     * @param  class-string<Data>  $data
     * @param  list<string>  $allowedFilters
     * @param  list<string>  $allowedSorts
     */
    public static function resolve(
        Firestore $firestore,
        string $collection,
        string $data,
        SourceRequest $request,
        array $allowedFilters = [],
        array $allowedSorts = [],
    ): SourceResult {
        $query = FirebaseQuery::for(
            query: $firestore
                ->database()
                ->collection($collection),
            request: $request,
            allowedFilters: $allowedFilters,
            allowedSorts: $allowedSorts,
        );

        $total = $query->count();

        $documents = $query
            ->limit($request->perPage)
            ->documents();

        $records = [];

        $lastDocument = null;

        foreach ($documents as $document) {
            if (! $document->exists()) {
                continue;
            }

            $record = $document->data();

            $record['id'] = $document->id();

            $records[] = $data::from(
                $record,
            )->toArray();

            $lastDocument = $document;
        }

        $lastPage = $total > 0
            ? (int) ceil(
                $total / $request->perPage,
            )
            : 1;

        $nextCursor = null;

        if (
            $lastDocument !== null
            && count($records) === $request->perPage
        ) {
            $nextCursor = self::encodeDocumentCursor(
                $lastDocument,
                $request,
            );
        }

        return new SourceResult(
            records: $records,
            pagination: [
                'enabled' => true,
                'perPage' => $request->perPage,
                'page' => $request->page,
                'total' => $total,
                'lastPage' => $lastPage,
                'nextCursor' => $nextCursor,
                'previousCursor' => null,
            ],
        );
    }

    private static function encodeDocumentCursor(
        object $document,
        SourceRequest $request,
    ): string {
        $data = $document->data();

        $values = [];

        $sorts = $request->sorts();

        if ($sorts === []) {
            $values[] = $document->id();
        } else {
            foreach ($sorts as $sort) {
                $field = ltrim(
                    $sort,
                    '-',
                );

                $values[] = $data[$field] ?? null;
            }

            $values[] = $document->id();
        }

        return FirebaseQuery::encodeCursor(
            $values,
        );
    }
}
