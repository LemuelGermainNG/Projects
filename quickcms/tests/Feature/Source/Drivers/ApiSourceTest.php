<?php

declare(strict_types=1);

use App\Core\Source\Drivers\ApiSource;
use App\Core\Source\SourceRequest;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelData\Data;

final class ApiUserData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }
}

it('resolves records from an api', function (): void {
    Http::fake([
        'https://example.test/users*' => Http::response([
            [
                'id' => 1,
                'name' => 'Alice',
            ],
            [
                'id' => 2,
                'name' => 'Bob',
            ],
        ]),
    ]);

    $result = ApiSource::resolve(
        endpoint: 'https://example.test/users',
        data: ApiUserData::class,
        request: new SourceRequest(),
    );

    expect($result->records)
        ->toHaveCount(2);

    expect($result->records[0])
        ->toMatchArray([
            'id' => 1,
            'name' => 'Alice',
        ]);

    Http::assertSent(
        fn ($request): bool =>
            $request->url() ===
            'https://example.test/users',
    );
});
