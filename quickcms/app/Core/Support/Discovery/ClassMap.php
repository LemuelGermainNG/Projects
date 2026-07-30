<?php

declare(strict_types=1);

namespace App\Core\Support\Discovery;

final class ClassMap
{
    /**
     * @var array<class-string,string>
     */
    protected array $classes = [];

    public function __construct(
        ?string $path = null,
    ) {
        $path ??= base_path('vendor/composer/autoload_classmap.php');

        if (is_file($path)) {
            /** @var array<class-string,string> $classes */
            $classes = require $path;

            $this->classes = $classes;
        }
    }

    /**
     * @return array<class-string,string>
     */
    public function all(): array
    {
        return $this->classes;
    }
}
