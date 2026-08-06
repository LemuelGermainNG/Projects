<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\Blocks;

use App\Core\Schema\Form\Input\Blocks\Block\BlockSchema;
use Closure;

trait HasBlocks
{
    /**
     * @var array<int, BlockSchema>|Closure|null
     */
    protected array|Closure|null $blocks = null;

    /**
     * @param array<int, BlockSchema>|Closure|null $blocks
     *
     * @return array<int, BlockSchema>|Closure|static|null
     */
    public function blocks(
        array|Closure|null $blocks = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->blocks;
        }

        return $this->with(
            'blocks',
            $blocks,
        );
    }
}
