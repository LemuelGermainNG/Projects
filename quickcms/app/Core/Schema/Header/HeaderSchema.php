<?php

declare(strict_types=1);

namespace App\Core\Schema\Header;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasIcon;
use App\Core\Support\Concerns\HasProps;

final class HeaderSchema extends Schema
{
    use HasIcon;
    use HasProps;

    protected ?string $title = null;

    protected ?string $description = null;

    public function title(?string $title = null): string|static|null
    {
        if (func_num_args() === 0) {
            return $this->title;
        }

        return $this->with('title', $title);
    }

    public function description(?string $description = null): string|static|null
    {
        if (func_num_args() === 0) {
            return $this->description;
        }

        return $this->with('description', $description);
    }
}
