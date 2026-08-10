<?php

use App\Core\Providers\CoreServiceProvider;
use App\Providers\AppServiceProvider;
use App\Providers\QuickCmsServiceProvider;

return [
    AppServiceProvider::class,
    CoreServiceProvider::class,
    QuickCmsServiceProvider::class,
];
