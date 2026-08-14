<?php

declare(strict_types=1);

namespace App\Core\Schema\Page;

use App\Core\Schema\Header\HeaderSchema;
use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasProps;

final class PageSchema extends Schema
{
    use HasProps;

    /**
     * @var array<string, mixed>
     */
    protected array $metadata = [];

    protected ?HeaderSchema $header = null;

    protected ?Schema $content = null;

    /**
     * @param array<string, mixed>|null $metadata
     *
     * @return array<string, mixed>|static
     */
    public function metadata(
        ?array $metadata = null,
    ): array|static {
        if (func_num_args() === 0) {
            return $this->metadata;
        }

        return $this->with(
            'metadata',
            $metadata ?? [],
        );
    }

    public function header(
        ?HeaderSchema $header = null,
    ): HeaderSchema|static|null {
        if (func_num_args() === 0) {
            return $this->header;
        }

        return $this->with('header', $header);
    }

    public function content(
        ?Schema $content = null,
    ): Schema|static|null {
        if (func_num_args() === 0) {
            return $this->content;
        }

        return $this->with('content', $content);
    }
}
