<?php

declare(strict_types=1);

namespace App\Core\Bridge\Spatie\MediaLibrary\Source;

use App\Core\Bridge\Spatie\MediaLibrary\Support\Enums\Collection;
use App\Core\Source\Drivers\Model\ModelQuery;
use App\Core\Source\Source;
use App\Core\Source\SourceRequest;
use App\Core\Source\SourceResult;
use Closure;
use Spatie\LaravelData\Data;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueryBuilder\QueryBuilder;

final class MediaSource extends Source
{
    protected string|Collection|Closure|null $collection = null;

    public function collection(
        string|Collection|Closure|null $collection = null,
    ): string|Collection|Closure|null|static {
        if (func_num_args() === 0) {
            return $this->collection;
        }

        return $this->with(
            'collection',
            $collection,
        );
    }

    public static function model(): string
    {
        return Media::class;
    }

    public static function data(): string
    {
        return Data::class;
    }

    public function query(): QueryBuilder
    {
        $query = ModelQuery::for(
            model: Media::class,
        );

        $collection = $this->evaluate(
            $this->collection(),
        );

        if ($collection instanceof Collection) {
            $collection = $collection->value;
        }

        if ($collection !== null) {
            $query->where(
                'collection_name',
                $collection,
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
                    fn (Media $media): array =>
                        Data::from($media)->toArray(),
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
