<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers\Firebase;

use App\Core\Source\Drivers\Firebase\FirebaseQuery;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use Kreait\Firebase\Contract\Firestore;
use Spatie\LaravelData\Data;

final class FirebaseSource
{
    /**
     * @param class-string<Data> $data
     * @param list<string> $allowedFilters
     * @param list<string> $allowedSorts
     */
    public static function resolve(
        Firestore $firestore,
        string $collection,
        string $data,
        SourceRequest $request,
        array $allowedFilters = [],
        array $allowedSorts = [],
    ): SourceResult {
        $query = $firestore
            ->database()
            ->collection($collection);

        $query = FirebaseQuery::for(
            query: $query,
            request: $request,
            allowedFilters: $allowedFilters,
            allowedSorts: $allowedSorts,
        );

        $documents = $query->documents();

        $records = [];

        foreach ($documents as $document) {
            if (! $document->exists()) {
                continue;
            }

            $record = $document->data();

            $record['id'] = $document->id();

            $records[] = $data::from(
                $record,
            )->toArray();
        }

        return new SourceResult(
            records: $records,
            pagination: [
                'enabled' => false,
                'perPage' => count($records),
                'page' => 1,
                'total' => count($records),
                'lastPage' => 1,
            ],
        );
    }
}
