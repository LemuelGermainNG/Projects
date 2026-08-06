<?php

declare(strict_types=1);

namespace App\Core\Schema\Form\Base;

abstract class FileInputBaseBuilder extends BaseInputBuilder
{
    public function build(): array
    {
        /** @var FileInputBaseSchema $schema */
        $schema = $this->schema;

        $data = parent::build();

        unset($data['props']);

        $this->addIfNotNull(
            $data,
            'acceptedFileTypes',
            $this->evaluate(
                $schema->acceptedFileTypes(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'disk',
            $this->evaluate(
                $schema->disk(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'directory',
            $this->evaluate(
                $schema->directory(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'visibility',
            $this->evaluate(
                $schema->visibility(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'maxFiles',
            $this->evaluate(
                $schema->maxFiles(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'maxSize',
            $this->evaluate(
                $schema->maxSize(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'minSize',
            $this->evaluate(
                $schema->minSize(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'multiple',
            $this->evaluate(
                $schema->isMultiple(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'downloadable',
            $this->evaluate(
                $schema->isDownloadable(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'openable',
            $this->evaluate(
                $schema->isOpenable(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'previewable',
            $this->evaluate(
                $schema->isPreviewable(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'preserveFilenames',
            $this->evaluate(
                $schema->isPreserveFilenames(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'reorderable',
            $this->evaluate(
                $schema->isReorderable(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'collection',
            $this->evaluate($schema->collection()),
        );

        $this->addIfNotNull(
            $data,
            'conversions',
            $this->evaluateEnums(
                $schema->conversions(),
            ),
        );

        $this->addIfNotNull(
            $data,
            'responsiveImages',
            $this->evaluate($schema->isResponsiveImages()),
        );

        $this->addIfNotNull(
            $data,
            'temporaryUrls',
            $this->evaluate($schema->isTemporaryUrls()),
        );

        $this->addIfNotNull(
            $data,
            'imageEditor',
            $this->evaluate($schema->isImageEditor()),
        );

        $this->addIfNotNull(
            $data,
            'optimize',
            $this->evaluate($schema->isOptimize()),
        );

        $data['props'] = $schema->props();

        return $data;
    }
}
