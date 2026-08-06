<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\MediaLibrary\Traits;

use App\Core\Bridge\Spatie\MediaLibrary\Support\Enums\Collection;

trait InteractsWithMediaLibrary
{
    public function mediaLibrary(
        string|Collection|null $collection = null,
    ): static {
        if ($collection !== null) {
            $this->collection(
                $collection instanceof Collection
                    ? $collection->value
                    : $collection,
            );
        }

        return $this;
    }
}
