<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

use App\Core\Application\Application;
use App\Core\Builder\BuilderRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ApplicationSchemaController
{
    /**
     * Return application metadata.
     */
    public function show(
        string $application,
    ): JsonResponse {
        $metadata = Application::find(
            $application,
        );

        if ($metadata === null) {
            return response()->json(
                [
                    'message' => 'Application not found.',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }

        return response()->json([
            'data' => $metadata->toArray(),
        ]);
    }

    /**
     * Return the compiled application schema.
     */
    public function schema(
        string $application,
    ): JsonResponse {
        $metadata = Application::find(
            $application,
        );

        if ($metadata === null) {
            return response()->json(
                [
                    'message' => 'Application not found.',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }

        $schema = Application::build(
            $metadata,
            ApplicationSchema::make(),
        );

        return response()->json([
            'data' => [
                'application' => $metadata->toArray(),
                'schema' => $schema->compile(
                    app(BuilderRegistry::class),
                ),
            ],
        ]);
    }
}
