<?php

declare(strict_types=1);

namespace App\Core\Schema\Modal;

use App\Core\Schema\Schema;
use App\Core\Support\Enums\Position;
use App\Core\Support\Enums\Size;

final class ModalSchema extends Schema
{
    public function __construct(
        protected string $title = '',
        protected ?string $description = null,
        protected Size $size = Size::Medium,
        protected Position $position = Position::Center,
        protected bool $closable = true,
        protected bool $closeOnEscape = true,
        protected bool $closeOnBackdrop = true,
        protected bool $stickyHeader = false,
        protected bool $stickyFooter = false,
        protected Schema|string|array|null $content = null,
        protected array $props = [],
    ) {
    }

    public static function make(): self
    {
        return new self();
    }

    public function title(string $title): self
    {
        $clone = clone $this;

        $clone->title = $title;

        return $clone;
    }

    public function description(?string $description): self
    {
        $clone = clone $this;

        $clone->description = $description;

        return $clone;
    }

    public function size(Size $size): self
    {
        $clone = clone $this;

        $clone->size = $size;

        return $clone;
    }

    public function position(Position $position): self
    {
        $clone = clone $this;

        $clone->position = $position;

        return $clone;
    }

    public function closable(bool $closable = true): self
    {
        $clone = clone $this;

        $clone->closable = $closable;

        return $clone;
    }

    public function closeOnEscape(bool $closeOnEscape = true): self
    {
        $clone = clone $this;

        $clone->closeOnEscape = $closeOnEscape;

        return $clone;
    }

    public function closeOnBackdrop(bool $closeOnBackdrop = true): self
    {
        $clone = clone $this;

        $clone->closeOnBackdrop = $closeOnBackdrop;

        return $clone;
    }

    public function stickyHeader(bool $stickyHeader = true): self
    {
        $clone = clone $this;

        $clone->stickyHeader = $stickyHeader;

        return $clone;
    }

    public function stickyFooter(bool $stickyFooter = true): self
    {
        $clone = clone $this;

        $clone->stickyFooter = $stickyFooter;

        return $clone;
    }

    public function content(Schema|string|array|null $content): self
    {
        $clone = clone $this;

        $clone->content = $content;

        return $clone;
    }

    public function props(array $props): self
    {
        $clone = clone $this;

        $clone->props = $props;

        return $clone;
    }
}
