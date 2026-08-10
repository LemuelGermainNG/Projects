<?php

declare(strict_types=1);

use App\Http\Controllers\Core\ApplicationSchemaController;
use Illuminate\Support\Facades\Route;

Route::prefix('applications')
    ->group(function (): void {
        Route::get(
            '/{application}',
            [ApplicationSchemaController::class, 'show'],
        );

        Route::get(
            '/{application}/schema',
            [ApplicationSchemaController::class, 'schema'],
        );
    });
