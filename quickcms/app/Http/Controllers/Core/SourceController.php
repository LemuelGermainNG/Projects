<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

use App\Core\Source\Contracts\CreatesRecords;
use App\Core\Source\Contracts\ReadsRecords;
use App\Core\Source\Contracts\DeletesRecords;
use App\Core\Source\Contracts\UpdatesRecords;
use App\Core\Source\SourceRegistry;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResolver;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

final class SourceController extends Controller
{
    public function __construct(
        protected readonly SourceRegistry $registry,
        protected readonly SourceResolver $resolver,
    ) {}

    /**
     * List source records.
     */
    public function index(
        Request $request,
        string $source,
    ): JsonResponse {
        $resolved = $this->resolveSource(
            $source,
        );

        $result = $this->resolver->resolve(
            source: $resolved,
            request: $this->sourceRequest($request),
        );

        return response()->json([
            'data' => $result->toArray(),
        ]);
    }

    /**
     * Read a single source record.
     */
    public function show(
        Request $request,
        string $source,
        string $id,
    ): JsonResponse {
        $resolved = $this->resolveSource(
            $source,
        );

        if (! $resolved instanceof ReadsRecords) {
            return response()->json(
                [
                    'message' => 'Source does not support read.',
                ],
                Response::HTTP_METHOD_NOT_ALLOWED,
            );
        }

        $result = $resolved->read(
            id: $id,
            request: $this->sourceRequest($request),
        );

        $record = $result->records[0] ?? null;

        if ($record === null) {
            return response()->json(
                [
                    'message' => 'Source record not found.',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }

        return response()->json([
            'data' => [
                'record' => $record,
            ],
        ]);
    }

    /**
     * Create a source record.
     */
    public function store(
        Request $request,
        string $source,
    ): JsonResponse {
        $resolved = $this->resolveSource(
            $source,
        );

        if (! $resolved instanceof CreatesRecords) {
            return response()->json(
                [
                    'message' => 'Source does not support create.',
                ],
                Response::HTTP_METHOD_NOT_ALLOWED,
            );
        }

        $result = $resolved->create(
            $this->sourceRequest($request),
        );

        return response()->json(
            [
                'data' => $result->toArray(),
            ],
            Response::HTTP_CREATED,
        );
    }

    /**
     * Update a source record.
     */
    public function update(
        Request $request,
        string $source,
        string $id,
    ): JsonResponse {
        $resolved = $this->resolveSource(
            $source,
        );

        if (! $resolved instanceof UpdatesRecords) {
            return response()->json(
                [
                    'message' => 'Source does not support update.',
                ],
                Response::HTTP_METHOD_NOT_ALLOWED,
            );
        }

        $result = $resolved->update(
            id: $id,
            request: $this->sourceRequest($request),
        );

        return response()->json([
            'data' => $result->toArray(),
        ]);
    }

    /**
     * Delete a source record.
     */
    public function destroy(
        Request $request,
        string $source,
        string $id,
    ): JsonResponse {
        $resolved = $this->resolveSource(
            $source,
        );

        if (! $resolved instanceof DeletesRecords) {
            return response()->json(
                [
                    'message' => 'Source does not support delete.',
                ],
                Response::HTTP_METHOD_NOT_ALLOWED,
            );
        }

        $result = $resolved->delete(
            id: $id,
            request: $this->sourceRequest($request),
        );

        return response()->json([
            'data' => $result->toArray(),
        ]);
    }

    private function resolveSource(
        string $source,
    ): object {
        try {
            return $this->registry
                ->resolveByName($source);
        } catch (InvalidArgumentException) {
            abort(
                Response::HTTP_NOT_FOUND,
                'Source not found.',
            );
        }
    }

    private function sourceRequest(
        Request $request,
    ): SourceRequest {
        return new SourceRequest(
            page: max(
                1,
                $request->integer(
                    'page',
                    1,
                ),
            ),
            perPage: min(
                100,
                max(
                    1,
                    $request->integer(
                        'perPage',
                        25,
                    ),
                ),
            ),
            query: $request->query(),
        );
    }
}
