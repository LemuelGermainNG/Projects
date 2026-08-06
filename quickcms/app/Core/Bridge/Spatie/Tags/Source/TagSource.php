<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\Tags\Source;

use App\Core\Bridge\SpatieTags\Support\TagType;
use App\Core\Source\Source;
use App\Core\Source\SourceQuery;
use App\Core\Support\Concerns\HasLocale;
use Closure;
use Spatie\LaravelData\Data;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Tags\Tag;

final class TagSource extends Source
{
    protected string|Closure|null $type = null;

    protected string|Closure|null $locale = null;

    public function type(
        string|Closure|null $type = null,
    ): string|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->type;
        }

        return $this->with(
            'type',
            $type,
        );
    }

    use HasLocale;

    public static function model(): string
    {
        return Tag::class;
    }

    public static function data(): string
    {
        return Data::class;
    }

    public function query(): QueryBuilder
    {
        $query = SourceQuery::for(
            static::class,
        );

        $type = $this->evaluate(
            $this->type(),
        );

        if ($type instanceof TagType) {
            $type = $type->value;
        }

        if ($type !== null) {
            $query->where(
                'type',
                $type,
            );
        }

        return $query;
    }
}
