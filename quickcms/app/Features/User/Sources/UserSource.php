<?php

declare(strict_types=1);

namespace App\Features\User\Sources;

use App\Core\Source\Drivers\ModelSource;
use App\Core\Source\Source;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use App\Core\Source\Contracts\ReadsRecords;
use App\Features\User\Data\UserData;
use App\Features\User\Models\User;
use Spatie\QueryBuilder\AllowedFilter;

final class UserSource extends Source implements ReadsRecords
{
    public function read(
        string|int $id,
        SourceRequest $request,
    ): SourceResult {
        return ModelSource::read(
            model: User::class,
            data: UserData::class,
            id: $id,
            request: $request,
        );
    }

    public function resolve(
        SourceRequest $request,
    ): SourceResult {
        return ModelSource::resolve(
            model: User::class,
            data: UserData::class,
            request: $request,
            allowedFilters: [
                AllowedFilter::exact('status'),
            ],
            allowedSorts: [
                'name',
                'email',
                'created_at',
            ],
        );
    }
}
