<?php

declare(strict_types=1);

namespace App\Features\User\Sources;

use App\Core\Source\Drivers\Firebase\FirebaseSource;
use App\Core\Source\Source;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use App\Core\Source\Contracts\ReadsRecords;
use App\Features\User\Data\UserData;
use Kreait\Firebase\Contract\Firestore;

final class FirebaseUserSource extends Source implements ReadsRecords
{
    public static function name(): string
    {
        return 'firebase-user';
    }

    public function read(
        string|int $id,
        SourceRequest $request,
    ): SourceResult {
        return FirebaseSource::read(
            firestore: app(Firestore::class),
            collection: 'users',
            data: UserData::class,
            id: $id,
            request: $request,
        );
    }

    public function resolve(
        SourceRequest $request,
    ): SourceResult {
        return FirebaseSource::resolve(
            firestore: app(Firestore::class),
            collection: 'users',
            data: UserData::class,
            request: $request,
            allowedFilters: [
                'status',
            ],
            allowedSorts: [
                'name',
                'email',
                'status',
            ],
        );
    }
}
