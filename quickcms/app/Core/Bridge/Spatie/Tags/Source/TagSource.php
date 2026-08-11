<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\Tags\Source;

use App\Core\Bridge\Spatie\Tags\Data\TagData;
use App\Core\Source\Source;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use App\Core\Support\Concerns\HasLocale;
use Closure;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Tags\Tag;

final class TagSource extends Source
{
    protected string|Closure|null $type = null;

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
        return TagData::class;
    }

    public function query(): QueryBuilder
    {
        $query = QueryBuilder::for(
            Tag::query(),
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

    public function resolve(
        SourceRequest $request,
    ): SourceResult {
        $paginator = $this->query()->paginate(
            perPage: $request->perPage,
            page: $request->page,
        );

        return new SourceResult(
            records: $paginator
                ->getCollection()
                ->map(
                    fn (Tag $tag): array =>
                        TagData::from($tag)->toArray(),
                )
                ->values()
                ->all(),

            pagination: [
                'enabled' => true,
                'perPage' => $paginator->perPage(),
                'page' => $paginator->currentPage(),
                'total' => $paginator->total(),
                'lastPage' => $paginator->lastPage(),
            ],
        );
    }
}
