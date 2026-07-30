<?php

declare(strict_types=1);

namespace App\Http;

use App\Core\Application\Application;
use App\Core\Application\ApplicationMetadata;
use App\Core\Schema\ApplicationSchema;
use App\Core\Schema\BrandSchema;
use Illuminate\Http\JsonResponse;

final class ApplicationController
{
    public function __invoke(): JsonResponse
    {
        $application = ApplicationMetadata::make()
            ->id('admin')
            ->name('Administration')
            ->path('/admin');

        $schema = ApplicationSchema::make()
            ->brand(
                BrandSchema::make()
                    ->name(config('app.name'))
                    ->logo('/logo.svg')
                    ->favicon('/favicon.ico')
            )
            ->props([
                'version' => config('quickcms.version'),
            ]);

        return response()->json(
            Application::build(
                $application,
                $schema,
            ),
        );
    }
}
