<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Markdown;

use App\Core\Support\Enum\Markdown\MarkdownFlavor;
use Closure;

trait HasFlavor
{
    protected MarkdownFlavor|Closure|null $flavor = null;

    public function flavor(
        MarkdownFlavor|Closure|null $flavor = null,
    ): MarkdownFlavor|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->flavor;
        }

        return $this->with(
            'flavor',
            $flavor,
        );
    }
}
