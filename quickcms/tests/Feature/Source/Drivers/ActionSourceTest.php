<?php

declare(strict_types=1);

use App\Core\Source\Drivers\ActionSource;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;

final class GetSourceRecordsAction
{
    public function handle(
        SourceRequest $request,
    ): SourceResult {
        return new SourceResult(
            records: [
                [
                    'id' => 1,
                    'name' => 'Alice',
                ],
            ],
            pagination: [
                'enabled' => false,
                'perPage' => 0,
                'page' => 1,
                'total' => 1,
                'lastPage' => 1,
            ],
        );
    }
}

it('resolves records from an action', function (): void {
    $result = ActionSource::resolve(
        action: GetSourceRecordsAction::class,
        request: new SourceRequest(),
    );

    expect($result->records)
        ->toHaveCount(1);

    expect($result->records[0])
        ->toMatchArray([
            'id' => 1,
            'name' => 'Alice',
        ]);
});
