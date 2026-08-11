<?php

declare(strict_types=1);

namespace App\Core\Source\Drivers;

use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelData\Data;

final class ApiSource
{
    /**
     * @param class-string<Data> $data
     */
    public static function resolve(
        string $endpoint,
        string $data,
        SourceRequest $request,
    ): SourceResult {
        $response = Http::get(
            $endpoint,
            $request->query,
        );

        $response->throw();

        return self::result(
            response: $response,
            data: $data,
        );
    }

    /**
     * @param class-string<Data> $data
     */
    private static function result(
        Response $response,
        string $data,
    ): SourceResult {
        $payload = $response->json();

        $records = $payload['data'] ?? $payload;

        if (!is_array($records)) {
            $records = [];
        }

        return new SourceResult(
            records: collect($records)
                ->filter(
                    static fn (mixed $record): bool =>
                        is_array($record),
                )
                ->map(
                    static fn (array $record): array =>
                        $data::from($record)->toArray(),
                )
                ->values()
                ->all(),

            pagination: [
                'enabled' => false,
                'perPage' => 0,
                'page' => 1,
                'total' => count($records),
                'lastPage' => 1,
            ],
        );
    }
}
