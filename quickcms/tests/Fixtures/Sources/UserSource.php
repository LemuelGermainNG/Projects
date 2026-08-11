<?php

declare(strict_types=1);

namespace Tests\Fixtures\Sources;

use App\Core\Source\Source;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use App\Core\Source\Drivers\ModelSource;
use App\Features\User\Data\UserData;
use App\Features\User\Models\User;

final class UserSource extends Source
{
    public function resolve(
        SourceRequest $request,
    ): SourceResult {
        return ModelSource::resolve(
            model: User::class,
            data: UserData::class,
            request: $request,
        );
    }

}
