<?php

declare(strict_types=1);

namespace App\Core\Schema\Modal;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasSize;
use App\Core\Support\Enum\Position;

final class ModalSchema extends Schema
{
    use HasSize;

    protected string $title = '';

    protected ?string $description = null;

    protected Position $position = Position::Center;

    protected bool $closable = true;

    protected bool $closeOnEscape = true;

    protected bool $closeOnBackdrop = true;

    protected bool $stickyHeader = false;

    protected bool $stickyFooter = false;

    protected Schema|string|array|null $content = null;

    protected array $props = [];

    public static function make(): static
    {
        return new static();
    }

    public function title(?string $title = null): string|static
    {
        if (func_num_args() === 0) {
            return $this->title;
        }

        return $this->with('title', $title);
    }

    public function description(?string $description = null): string|static|null
    {
        if (func_num_args() === 0) {
            return $this->description;
        }

        return $this->with('description', $description);
    }

    public function position(?Position $position = null): Position|static
    {
        if (func_num_args() === 0) {
            return $this->position;
        }

        return $this->with('position', $position);
    }

    public function closable(bool $enabled = true): static
    {
        return $this->with('closable', $enabled);
    }

    public function isClosable(): bool
    {
        return $this->closable;
    }

    public function closeOnEscape(bool $enabled = true): static
    {
        return $this->with('closeOnEscape', $enabled);
    }

    public function closesOnEscape(): bool
    {
        return $this->closeOnEscape;
    }

    public function closeOnBackdrop(bool $enabled = true): static
    {
        return $this->with('closeOnBackdrop', $enabled);
    }

    public function closesOnBackdrop(): bool
    {
        return $this->closeOnBackdrop;
    }

    public function stickyHeader(bool $enabled = true): static
    {
        return $this->with('stickyHeader', $enabled);
    }

    public function hasStickyHeader(): bool
    {
        return $this->stickyHeader;
    }

    public function stickyFooter(bool $enabled = true): static
    {
        return $this->with('stickyFooter', $enabled);
    }

    public function hasStickyFooter(): bool
    {
        return $this->stickyFooter;
    }

    public function content(
        Schema|string|array|null $content = null,
    ): Schema|string|array|static|null {
        if (func_num_args() === 0) {
            return $this->content;
        }

        return $this->with('content', $content);
    }

    public function props(?array $props = null): array|static
    {
        if (func_num_args() === 0) {
            return $this->props;
        }

        return $this->with('props', $props);
    }
}
