<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\Tags\Traits;

use App\Core\Bridge\Spatie\Tags\Source\TagSource;
use App\Core\Schema\Form\Relationship\RelationshipSchema;
use Closure;

trait InteractsWithSpatieTags
{
    public function spatie(
        string|Closure|null $type = null,
        string|Closure|null $locale = null,
    ): static {
        $source = TagSource::make();

        if ($type !== null) {
            $source->type($type);
        }

        if ($locale !== null) {
            $source->locale($locale);
        }

        return $this->relationship(
            RelationshipSchema::make()
                ->source(
                    $source::class,
                )
                ->label('name')
                ->value('id'),
        );
    }
}
