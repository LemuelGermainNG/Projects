<?php

declare(strict_types=1);

namespace App\Core\Support\Concerns;

use App\Core\Schema\Form\Relationship\RelationshipSchema;

trait HasRelationship
{
    protected ?RelationshipSchema $relationship = null;

    public function relationship(
        ?RelationshipSchema $relationship = null,
    ): RelationshipSchema|null|static {
        if (func_num_args() === 0) {
            return $this->relationship;
        }

        return $this->with(
            'relationship',
            $relationship,
        );
    }
}
