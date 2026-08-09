<?php

declare(strict_types=1);

namespace App\Core\Schema\Dashboard;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasDashboard;
use App\Core\Support\Concerns\HasDashboardContext;
use App\Core\Support\Concerns\HasDescription;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasProps;
use App\Core\Support\Concerns\HasTitle;
use App\Core\Support\Concerns\HasVisible;

final class DashboardSchema extends Schema
{
    use HasDashboard;
    use HasDescription;
    use HasIcon;
    use HasProps;
    use HasTitle;
    use HasVisible;
    use HasDashboardContext;
}
