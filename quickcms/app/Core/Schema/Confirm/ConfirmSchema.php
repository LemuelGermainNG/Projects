<?php

declare(strict_types=1);

namespace App\Core\Schema\Confirm;

use App\Core\Schema\Schema;
use App\Core\Support\Concerns\HasColor;
use App\Core\Support\Concerns\HasIcon;

final class ConfirmSchema extends Schema
{
    use HasIcon;
    use HasColor;

    protected string $title = '';

    protected ?string $description = null;

    protected string $confirmLabel = 'Confirm';

    protected string $cancelLabel = 'Cancel';

    protected array $props = [];

    public static function make(): static
    {
        return new static();
    }

    public function title(?string $title = null): string|static
    {
        if ($title === null) {
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

    public function confirmLabel(?string $label = null): string|static
    {
        if ($label === null) {
            return $this->confirmLabel;
        }

        return $this->with('confirmLabel', $label);
    }

    public function cancelLabel(?string $label = null): string|static
    {
        if ($label === null) {
            return $this->cancelLabel;
        }

        return $this->with('cancelLabel', $label);
    }

    public function props(?array $props = null): array|static
    {
        if ($props === null) {
            return $this->props;
        }

        return $this->with('props', $props);
    }
}
