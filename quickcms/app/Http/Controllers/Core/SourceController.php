<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

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
    ) {
    }

    /**
     * Return source data.
     */
    public function index(
        Request $request,
        string $source,
    ): JsonResponse {
        try {
            $resolved = $this->registry
                ->resolveByName($source);
        } catch (InvalidArgumentException) {
            return response()->json(
                [
                    'message' => 'Source not found.',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }

        $sourceRequest = new SourceRequest(
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
                        20,
                    ),
                ),
            ),
            query: $request->query(),
        );

        $result = $this->resolver->resolve(
            source: $resolved,
            request: $sourceRequest,
        );

        return response()->json([
            'data' => $result->toArray(),
        ]);
    }
}
