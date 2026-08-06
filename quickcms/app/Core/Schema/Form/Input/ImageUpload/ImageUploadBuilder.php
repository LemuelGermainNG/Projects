<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Input\ImageUpload;

use App\Core\Schema\Form\Base\FileInputBaseBuilder;

final class ImageUploadBuilder extends FileInputBaseBuilder
{
    public static function schema(): string
    {
        return ImageUploadSchema::class;
    }

    public function build(): array
    {
        /** @var ImageUploadSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'crop',
            $this->evaluate($schema->isCrop()),
        );

        $this->addIfNotNull(
            $data,
            'circleCrop',
            $this->evaluate($schema->isCircleCrop()),
        );

        $this->addIfNotNull(
            $data,
            'avatar',
            $this->evaluate($schema->isAvatar()),
        );

        $this->addIfNotNull(
            $data,
            'aspectRatio',
            $this->evaluate($schema->aspectRatio()),
        );

        $this->addIfNotNull(
            $data,
            'resize',
            $this->evaluate($schema->resize()),
        );

        $this->addIfNotNull(
            $data,
            'imageQuality',
            $this->evaluate($schema->imageQuality()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
