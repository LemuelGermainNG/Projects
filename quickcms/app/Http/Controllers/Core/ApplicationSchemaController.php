<?php

declare(strict_types=1);

namespace App\Http\Controllers\Core;

use App\Core\Application\Application;
use App\Core\Builder\BuilderRegistry;
use App\Core\Navigation\NavigationRegistry;
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

    /**
     * Return a compiled application page.
     */
    public function page(
        string $application,
        string $name,
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

        $pageMatch = app(NavigationRegistry::class)
            ->resolvePageMatch(
                application: $application,
                route: $name,
            );

        if ($pageMatch === null) {
            return response()->json(
                [
                    'message' => 'Page not found.',
                ],
                Response::HTTP_NOT_FOUND,
            );
        }

        $page = app($pageMatch['page']);

        return response()->json([
            'data' => [
                'application' => $metadata->toArray(),
                'route' => $name,
                'parameters' => $pageMatch['parameters'],
                'page' => $page->content()
                    ->metadata($page->metadata())
                    ->compile(
                        app(BuilderRegistry::class),
                    ),
            ],
        ]);
    }
}
