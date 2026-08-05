<?php

namespace App\Core\Support\Enums\Date;

enum DateFormat: string
{
    case Date = 'Y-m-d';

    case DateTime = 'Y-m-d H:i:s';

    case Time = 'H:i';

    case Iso8601 = DATE_ATOM;

    case RFC3339 = DATE_RFC3339;
}
