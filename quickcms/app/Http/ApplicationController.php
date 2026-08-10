<?php

declare(strict_types=1);

namespace App\Http;

use App\Core\Application\Application;
use App\Core\Builder\BuilderRegistry;
use App\Core\Schema\Application\ApplicationSchema;
use App\Core\Schema\Brand\BrandSchema;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ApplicationController
{
    public function __construct(
        protected BuilderRegistry $builders,
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $application = Application::find('admin');

        abort_if(
            $application === null,
            Response::HTTP_NOT_FOUND,
            'Application [admin] not found.',
        );

        $schema = Application::build(
            $application,
            ApplicationSchema::make()
                ->brand(
                    BrandSchema::make()
                        ->name(config('app.name'))
                        ->logo('/logo.svg')
                        ->favicon('/favicon.ico'),
                )
                ->props([
                    'version' => config('quickcms.version'),
                ]),
        );

        return response()->json(
            $schema->compile(
                $this->builders,
            ),
        );
    }
}
