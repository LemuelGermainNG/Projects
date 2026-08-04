<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Element\Image\ImageSchema;

trait HasImage
{
    protected ?ImageSchema $image = null;

    public function image(
        ?ImageSchema $image = null,
    ): ImageSchema|null|static {
        if (func_num_args() === 0) {
            return $this->image;
        }

        return $this->with(
            'image',
            $image,
        );
    }
}
