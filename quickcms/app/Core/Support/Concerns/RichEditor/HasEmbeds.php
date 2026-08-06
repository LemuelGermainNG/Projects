<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns\RichEditor;

use App\Core\Support\Enum\RichEditor\EmbedProvider;
use Closure;

trait HasEmbeds
{
    /**
     * @var array<int, EmbedProvider|string>|Closure|null
     */
    protected array|Closure|null $embeds = null;

    /**
     * @param array<int, EmbedProvider|string>|Closure|null $embeds
     */
    public function embeds(
        array|Closure|null $embeds = null,
    ): array|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->embeds;
        }

        return $this->with(
            'embeds',
            $embeds,
        );
    }
}
