<?php

declare(strict_types=1);

use App\Http\Controllers\Core\ApplicationSchemaController;
use App\Http\Controllers\Core\SourceController;
use Illuminate\Support\Facades\Route;

Route::prefix('applications')
    ->group(function (): void {
        Route::get(
            '/{application}',
            [
                ApplicationSchemaController::class,
                'show',
            ],
        );

        Route::get(
            '/{application}/schema',
            [
                ApplicationSchemaController::class,
                'schema',
            ],
        );

        Route::get(
            '/{application}/pages/{name}',
            [
                ApplicationSchemaController::class,
                'page',
            ],
        )->where('name', '.*');
    });

Route::prefix('sources')
    ->group(function (): void {
        Route::get(
            '/{source}',
            [
                SourceController::class,
                'index',
            ],
        );

        Route::get(
            '/{source}/{id}',
            [
                SourceController::class,
                'show',
            ],
        );

        Route::post(
            '/{source}',
            [
                SourceController::class,
                'store',
            ],
        );

        Route::put(
            '/{source}/{id}',
            [
                SourceController::class,
                'update',
            ],
        );

        Route::patch(
            '/{source}/{id}',
            [
                SourceController::class,
                'update',
            ],
        );

        Route::delete(
            '/{source}/{id}',
            [
                SourceController::class,
                'destroy',
            ],
        );
    });
